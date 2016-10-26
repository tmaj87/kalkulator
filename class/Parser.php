<?php

class Parser
{

    private static $database_file = 'baza_zmydlania.json';
    private static $cached_database;

    static function parsePostInput() : array
    {
        $array = array();
        foreach (self::getDatabase() as $record) {
            $id = self::getIdFor($record['nazwa']);
//            $rank = Rank::getFor($id);

            $oil_amount = self::getPostSanitizeInt($id);
            if ($oil_amount < 1) continue;

            $record['gram'] = $oil_amount;
//            $record['rank'] = $rank;
            $array[$id] = $record;
        }
        uasort($array, array(__CLASS__, 'compareByNazwa'));
        return $array;
    }

    static function getPostSanitizeInt(string $name) : int
    {
        return intval(filter_input(INPUT_POST, $name, FILTER_SANITIZE_NUMBER_INT)) ?? 0;
    }

    static function getPostSanitizeString(string $name) : string
    {
        return filter_input(INPUT_POST, $name, FILTER_SANITIZE_STRING) ?? '';
    }

    static function getIdFor(string $name) : string
    {
        return base64_encode(self::stripSpaces($name));
    }

    static function getDatabase() : array
    {
        if (empty(self::$cached_database)) {
            self::$cached_database = json_decode(file_get_contents(self::$database_file), true);
        }
        return self::$cached_database;
    }

    static function getTabDataFor(string $type) : array
    {
        $array = array();
        foreach (self::getDatabase() as $record) {
            if (self::normalise($record['typ']) == $type) {
                $name = $record['nazwa'];
                $id = self::getIdFor($name);
                $array[$id] = $name;
            }
        }
        uasort($array, array(__CLASS__, 'stringCompare'));
        return $array;
    }

    private static function stringCompare(string $a, string $b) : int
    {
        return strcmp($a, $b);
    }

    private static function compareByNazwa(array $a, array $b) : int
    {
        return strcmp($a['nazwa'], $b['nazwa']);
    }

    private static function stripSpaces(string $string) : string
    {
        return strtr($string, array(' ' => ''));
    }

    private static function normalise(string $string) : string
    {
        return iconv('UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE', $string);
    }
}
