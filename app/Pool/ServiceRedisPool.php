<?php
/**
 * This file is part of Swoft.
 *
 * @link https://swoft.org
 * @document https://doc.swoft.org
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace App\Pool;
use App\Pool\Config\ServiceRedisPoolConfig;
use Swoft\Bean\Annotation\Inject;
use Swoft\Bean\Annotation\Pool;
use Swoft\Redis\Pool\RedisPool;

/**
 * the pool of redis service
 *
 * @Pool("serviceRedis")
 */
class ServiceRedisPool extends RedisPool
{
    /**
     * @Inject()
     *
     * @var ServiceRedisPoolConfig
     */
    protected $poolConfig;
}
