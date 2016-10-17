<?php

class Parser
{

    static function parse($database)
    {
        $array = array();
        foreach ($database as $record) {
            $id = self::getIdFor($record['nazwa']);
            $rank = Rank::getFor($id);

            $oil_amount = self::getInputFor($id);
            if ($oil_amount < 1) continue;

            $record['gram'] = $oil_amount;
            $record['rank'] = $rank;
            $array[$id] = $record;
        }
        return $array;
    }

    static function getInputFor($name)
    {
        return filter_input(INPUT_POST, $name, FILTER_SANITIZE_NUMBER_INT);
    }

    static function getAlkali()
    {
        return filter_input(INPUT_POST, 'alkali', FILTER_SANITIZE_STRING);
    }

    static function getIdFor($name)
    {
        $string = strtr($name, array(' ' => ''));
        return base64_encode($string);
    }
}
