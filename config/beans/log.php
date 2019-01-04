<?php
/*
 * This file is part of Swoft.
 * (c) Swoft <group@swoft.org>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [
    'noticeHandler'      => [
        'class'     => \App\Log\LogHandler::class,
        'logFile'   => '@runtime/logs/' . date('Y/m/d') . '/notice.log',
        'formatter' => '${lineFormatter}',
        'levels'    => [
            \Swoft\Log\Logger::NOTICE,
            \Swoft\Log\Logger::DEBUG,
            \Swoft\Log\Logger::TRACE,
        ],
    ],
    'applicationHandler' => [
        'class'     => \App\Log\LogHandler::class,
        'logFile'   => '@runtime/logs/' . date('Y/m/d') . '/error.log',
        'formatter' => '${lineFormatter}',
        'levels'    => [
            \Swoft\Log\Logger::ERROR,
            \Swoft\Log\Logger::WARNING,
        ],
    ],
    'infoHandler' => [
        'class'     => \App\Log\LogHandler::class,
        'logFile'   => '@runtime/logs/' . date('Y/m/d') . '/info.log',
        'formatter' => '${lineFormatter}',
        'levels'    => [
            \Swoft\Log\Logger::INFO,
        ],
    ],
    'logger' => [
        'name'          => APP_NAME,
        'enable'        => env('LOG_ENABLE', false),
        'flushInterval' => 100,
        'flushRequest'  => true,
        'handlers'      => [
            '${noticeHandler}',
            '${applicationHandler}',
            '${infoHandler}',
        ],
    ],
];
