<?php

/*
 * This file is part of Swoft.
 * (c) Swoft <group@swoft.org>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [
    # 用户服务熔断参数
    'user' => [
        'failCount'    => 3,
        'successCount' => 3,
        'delayTime'    => 500,
    ],
];