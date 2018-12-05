<?php

namespace Swoft\Redis\Operator\Hashes;

use Swoft\Redis\Operator\Command;

class HashGetAll extends Command
{
    /**
     * [Hash] hGetAll
     *
     * @return string
     */
    public function getId()
    {
        return 'hGetAll';
    }

    /**
     * {@inheritdoc}
     */
    public function parseResponse($data)
    {
        if ($data === false) {
            return false;
        }

        $result = [];
        for ($i = 0; $i < count($data); ++$i) {
            $result[$data[$i]] = $data[++$i];
        }

        return $result;
    }
}
