<?php

class Draw
{
    const FROM = array('/\s{2,}/', '/[\t\n\r]/');
    const TO = array(' ', '');

    public static function __callStatic($name, $arguments)
    {
        $filename = 'draw/' . $name . '.php';
        if (file_exists($filename)) {
            ob_start(array(__CLASS__, 'replace'));
            global $form_data;
            global $calculator;
            include $filename;
            ob_end_flush();
        }
    }

    private static function replace($string)
    {
        return preg_replace(self::FROM, self::TO, $string);
    }
}
