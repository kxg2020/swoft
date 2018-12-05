<?php
namespace App\Tools;

trait SingletonTrait{
    public static $instance = null;

    /**
     * @return static
     */
    public static function getInstance(){
        self::$instance || self::$instance = new static();
        return self::$instance;
    }

}