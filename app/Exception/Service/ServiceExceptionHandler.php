<?php
namespace App\Exception\Service;
use Swoft\App;
use Swoft\Bean\Annotation\ExceptionHandler;
use Swoft\Bean\Annotation\Handler;
use Swoft\Bean\BeanFactory;
use Exception;
use Swoft\Http\Message\Server\Response;

/**
 * Class ApiExceptionHandler
 * @package App\Exception\Api
 * @ExceptionHandler()
 */
class ServiceExceptionHandler{
    /**
     * @var Response
     */
    private $ctx;
    private $file;
    private $line;
    private $code;
    private $msg ;
    private $exception = [];

    /**
     * @param Response $response
     * @param \Throwable $throwable
     * @return mixed
     * @Handler(Exception::class)
     */
    public function handlerException(Response $response, \Throwable $throwable){
        $this->ctx  = $response;
        $this->file = $throwable->getFile();
        $this->line = $throwable->getLine();
        $this->code = $throwable->getCode();
        $this->msg  = $throwable->getMessage();
        $this->exception = [
            'msg'  => $this->msg,
            'file' => $this->file,
            'line' => $this->line,
            'code' => $this->code
        ];
        App::error(json_encode($this->exception));
        return $this->code == 404 ? $this->routeNotFound() : $this->innerError();
    }

    /**
     * @return mixed
     * 404
     */
    private function routeNotFound(){
        return $this->ctx->json(BeanFactory::getBean("RequestFail")->routeNotFound());
    }

    /**
     * @return mixed
     * 500
     */
    private function innerError(){
        return $this->ctx->json(BeanFactory::getBean("RequestFail")->innerError());
    }
}
