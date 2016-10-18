<?php

class Draw
{
    private static $directory = 'draw/';
    private const FROM = array('/\s{2,}/', '/[\t\n\r]/');
    private const TO = array(' ', '');

    static public function __callStatic($name, $arguments)
    {
        $filename = self::$directory . $name . '.php';
        if (file_exists($filename)) {
            ob_start();
            include $filename;
            echo preg_replace(self::FROM, self::TO, ob_get_clean()) . PHP_EOL;
        }
    }
}