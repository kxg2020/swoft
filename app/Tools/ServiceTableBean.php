<?php
namespace App\Tools;
use Swoft\Memory\Table;

class ServiceTableBean extends Table {
    use SingletonTrait;

    public static function getInstance(string $name = '', int $size = 0, array $columns = []){
        self::$instance || self::$instance = new self($name, $size, $columns);
        return self::$instance;
    }
}