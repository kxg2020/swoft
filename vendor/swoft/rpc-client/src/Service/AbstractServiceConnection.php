<?php

namespace Swoft\Rpc\Client\Service;

use Swoft\Pool\AbstractConnection;

/**
 * Abstract service connection
 */
abstract class AbstractServiceConnection extends AbstractConnection implements ServiceConnectInterface
{
    /**
     * Close connection
     * @return bool
     */
    public function close()
    {
        return true;
    }
}
