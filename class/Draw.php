<?php

class Draw
{
    public static function __callStatic($name, $arguments)
    {
        $filename = 'draw/' . $name . '.php';
        if (file_exists($filename)) {
            ob_start();
            include $filename;
            echo preg_replace(array('/\s{2,}/', '/[\t\n\r]/'), array(' ', ''), ob_get_contents()) . PHP_EOL;
            ob_end_clean();
        }
    }
}