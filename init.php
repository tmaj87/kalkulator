<?php

session_start();

function __autoload($class)
{
    require_once 'class/' . $class . '.php';
}

$database = json_decode(file_get_contents('baza_zmydlania.json'), true);
$form_data = Parser::parse($database);
$calculator = new Calculator($form_data, Parser::getAlkali());
