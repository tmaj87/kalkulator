<?php

class Rank
{

    private $database;
    private $ranking;
    private $wpdb;
    const TABLE = "RANK_TABLE";

    public function __construct($database)
    {
        $this->ranking = $database;
        // wordpress database object
        define('SHORTINIT', TRUE);
        // ...
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->is_table_present();

    }

    public static function getFor($id)
    {
        return 0;
    }

    public function getRanking()
    {
        return $this->ranking;
    }

    private function is_table_present()
    {
        return $this->wpdb . get_var("SELECT COUNT(*) FROM $this->TABLE");
    }
}