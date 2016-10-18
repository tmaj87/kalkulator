<?php

class Draw
{
    public static function __callStatic($name, $arguments)
    {
        $filename = 'draw/' . $name . '.php';
        if (file_exists($filename)) {
            ob_start(array(__CLASS__, 'replace'));
            global $database, $form_data, $calculator; // TODO use $GLOBALS?
            include $filename;
            ob_end_flush();
        }
    }

    private static function replace($string)
    {
        return preg_replace(array('/\s{2,}/', '/[\t\n\r]/'), array(' ', ''), $string);
    }
}
