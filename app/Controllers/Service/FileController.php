<?php
namespace App\Controllers\Service;
use Swoft\Bean\Annotation\Inject;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Http\Message\Server\Request;
use Swoft\Http\Server\Bean\Annotation\RequestMethod;

/**
 * Class FileController
 * @package App\Controllers\Service
 * @Controller("/service")
 */
class FileController extends BaseController {
    private $file;
    private $key;
    private $ext = "xlsx";
    /**
     * @Inject()
     * @var \Swoft\Redis\Redis
     */
    private $redis = null;
    /**
     * @param Request $request
     * @RequestMapping("upload",method={RequestMethod::POST})
     */
    public function uploadFile(Request $request){
        $this->file = $request->file("file")->toArray();
        $success = $this->analysisExcel()->sortOutMetaData();
        if($success){
            return response()->json($this->printSuccess("000",["key" => $this->key]));
        }
        return response()->json($this->printFail("4003"));
    }

    /**
     * @throws \PHPExcel_Exception
     * @throws \PHPExcel_Reader_Exception
     */
    private function analysisExcel():FileController{
        $ext = substr(($this->file)["name"],strpos(($this->file)["name"],".") + 1);
        if($ext == $this->ext){
            $objReader = \PHPExcel_IOFactory::createReader("Excel2007");
            $objReader->setReadDataOnly(true);
            // 加载excel
            $objPHPExcel = $objReader->load(($this->file)["tmp_file"], 'utf-8');

            $finalResult = [];
            // 获取当前分区对象
            $sheet = $objPHPExcel->getSheet();
            // 获取当前分区数据记录行
            $highestRow = $sheet->getHighestRow();
            // 获取当前分区记录列
            $highestColumn = $sheet->getHighestColumn();
            for($row = 3;$row <= $highestRow; $row ++){
                $rowData = [];
                $index   = 0;
                for ($col = 'A' ; $col <= $highestColumn; $col ++){
                    $metaData = $sheet->getCell($col.$row)->getValue();
                    if($metaData) $rowData[] = $metaData;
                    $index ++;
                }
                if(count($rowData) == $index) $finalResult[$row] = $rowData;
            }
           $this->key = strtoupper(md5(microtime(true)."^_^".($this->file)["file"]["size"]));
           $this->file= array_values($finalResult);
        }
        return $this;
    }

    /**
     * 保存数据
     */
    private function sortOutMetaData():bool {
       $ret = $this->redis->hSet("co-ordinates-table",$this->key,json_encode($this->file,256));
       return $ret ? true : false;
    }
}
