<?php

namespace Swoft\Rpc\Client\Service;

use Swoft\App;
use Swoft\Rpc\Client\Exception\RpcClientException;
use Swoole\Coroutine\Client;

/**
 * Service connection
 */
class ServiceConnection extends AbstractServiceConnection
{
    /**
     * @var Client
     */
    protected $connection;

    /**
     * @throws RpcClientException
     */
    public function createConnection()
    {
        $client = new Client(SWOOLE_SOCK_TCP | SWOOLE_KEEP);

        $address = $this->pool->getConnectionAddress();
        $timeout = $this->pool->getTimeout();
        $setting = $this->getTcpClientSetting();
        $setting && $client->set($setting);

        list($host, $port) = explode(':', $address);
        if (!$client->connect($host, $port, $timeout)) {
            $error = sprintf('Service connect fail errorCode=%s host=%s port=%s', $client->errCode, $host, $port);
            App::error($error);
            throw new RpcClientException($error);
        }
        $this->connection = $client;
    }

    public function receive()
    {
        $result = $this->recv();
        $this->recv = true;
        return $result;
    }

    /**
     * @return void
     */
    public function reconnect()
    {
        $this->createConnection();
    }

    /**
     * @return bool
     */
    public function check(): bool
    {
        return $this->connection->isConnected();
    }

    /**
     * @param string $data
     *
     * @return bool
     */
    public function send(string $data): bool
    {
        $result =  $this->connection->send($data);
        $this->recv = false;
        return $result;
    }

    /**
     * @return string
     */
    public function recv(): string
    {
        $data = $this->connection->recv();
        if (empty($data)) {
            $errCode = intval($this->connection->errCode);
            throw new RpcClientException('ServiceConnection::recv error, errCode=' . $errCode, $errCode);
        }
        return $data;
    }

    /**
     * 返回TCP客户端的配置
     *
     * @return array
     */
    public function getTcpClientSetting(): array
    {
        return App::getAppProperties()->get('server.tcp.client', []);
    }

    /**
     * Close connection
     * @return bool
     */
    public function close()
    {
        return $this->connection->close(true);
    }
}
