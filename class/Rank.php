<?php

define('SHORTINIT', TRUE);

class Rank
{

    private $database;
    private $ranking;
    private $db_handle;

    public function __construct($database)
    {
        $this->ranking = $database;
        // wordpress database object
        global $wpdb;
        $this->db_handle = $wpdb;
//
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
        $this->db_handle.get_var( "SELECT COUNT(*) FROM $wpdb->users" );
    }
}