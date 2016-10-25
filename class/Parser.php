<?php

class Parser
{

    static function parsePostInput()
    {
        $array = array();
        foreach (self::getDatabase() as $record) {
            $id = self::getIdFor($record['nazwa']);
//            $rank = Rank::getFor($id);

            $oil_amount = self::getInputFor($id);
            if ($oil_amount < 1) continue;

            $record['gram'] = $oil_amount;
//            $record['rank'] = $rank;
            $array[$id] = $record;
        }
        uasort($array, array(__CLASS__, 'compareName'));
        return $array;
    }

    static function getInputFor($name)
    {
        return filter_input(INPUT_POST, $name, FILTER_SANITIZE_NUMBER_INT);
    }

    static function getBase()
    {
        return filter_input(INPUT_POST, 'base', FILTER_SANITIZE_STRING);
    }

    static function getIdFor($name)
    {
        $string = strtr($name, array(' ' => ''));
        return base64_encode($string);
    }

    static function getDatabase()
    {
        return json_decode(file_get_contents('baza_zmydlania.json'), true);
    }

    static function getTabDataFor($type)
    {
        $array = array();
        foreach (self::getDatabase() as $record) {
            if (self::normalise($record['typ']) == $type) {
                $name = $record['nazwa'];
                $id = self::getIdFor($name);
                $array[$id] = $name;
            }
        }
        uasort($array, array(__CLASS__, 'compare'));
        return $array;
    }

    private static function compare($a, $b)
    {
        return strcmp($a, $b);
    }

    private static function compareName($a, $b)
    {
        return strcmp($a['nazwa'], $b['nazwa']);
    }

    private static function normalise($string) {
        return iconv('UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE', $string);
    }
}
