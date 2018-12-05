<?php

/*
 * This file is part of Swoft.
 * (c) Swoft <group@swoft.org>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [
    'redis'     => [
        'name'        => 'redis',
        'uri'         => [
        ],
        'minActive'   => 8,
        'maxActive'   => 8,
        'maxWait'     => 8,
        'maxWaitTime' => 3,
        'maxIdleTime' => 60,
        'timeout'     => 8,
        'db'          => 1,
        'prefix'      => 'redis_',
        'serialize'   => 0,
    ],
    'serviceRedis' => [
        'db'     => 0,
        'prefix' => '',
    ],
];
