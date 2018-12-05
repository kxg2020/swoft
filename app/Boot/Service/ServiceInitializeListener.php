<?php
namespace App\Boot\Service;
use App\Constant\Enum;
use App\Tools\ServiceTableBean;
use Swoft\Bean\Annotation\ServerListener;
use Swoft\Bootstrap\Listeners\Interfaces\StartInterface;
use Swoft\Bootstrap\SwooleEvent;
use Swoft\Memory\Table;
use Swoole\Server;

/**
 * Class RedisInitializeListener
 * @package App\Boot\Service
 * @ServerListener(event=SwooleEvent::ON_START)
 */
class ServiceInitializeListener implements StartInterface {
    private $redis = null;
    private $table = null;
    private $microServiceApi;
    private $microServiceNode;

    public function __construct()
    {
        # 创建内存表
        $this->table = ServiceTableBean::getInstance("serviceApiNode", Enum::SWOOLE_TABLE_SIZE, [
            'node' => [Table::TYPE_STRING, 10],
            'api'  => [Table::TYPE_STRING, 255],
        ]);
        $this->table->create();
    }

    private function connect(){
        $this->redis = function ($host,$port){
            $this->redis = new \Redis();
            $this->redis->connect($host,$port);
        };
    }

    // 加载服务配置
    public function onStart(Server $server){
        # 引入服务节点
        $this->microServiceApi  = require \Swoft\App::getAlias("@configs").DS."service/api.php";
        $this->microServiceNode = require \Swoft\App::getAlias("@configs").DS."service/node.php";

        # 存节点信息到内存表
        $this->serviceToTable();

        if (env("SERVICE_STORAGE_LOCATION") == "R") {
            $this->connect();
            $this->serviceToRedis();
        }
    }

    // 服务加载到内存表
    private function serviceToTable(){
        $this->montageServiceApi(function ($key,$value){
           $this->table->set($key,["node"=>$key,"api"=>$value]);
        });
        echo "\033[42;30m service memory table initialize success! \033[0m".PHP_EOL;
    }

    // 服务加载到Redis
    private function serviceToRedis(){
        list($host,$port) = explode(":",env("REDIS_URI"));
        ($this->redis)($host,$port);
        $this->montageServiceApi(function ($key,$value){
            $this->redis->set($key,$value);
        });
        echo "\033[42;30m service redis initialize success! \033[0m".PHP_EOL;
    }

    // 拼接服务接口
    private function montageServiceApi($callback){
        if($this->microServiceNode && $this->microServiceApi){
            foreach ($this->microServiceNode as $key => $value){
                if(isset($this->microServiceApi[$key]) && !empty($this->microServiceApi[$key])){
                    foreach ($this->microServiceApi[$key] as $index => $item){
                        $serviceKey = $key.$index;
                        $serviceVal = $value."#".$item["api"]."#".$item["auth"];
                        $callback($serviceKey,$serviceVal);
                    }
                }
            }
        }
    }
}
