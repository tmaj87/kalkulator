<?php

session_start();

function __autoload($class)
{
    require_once 'class/' . $class . '.php';
}

// global variables
$form_data = Parser::parseDatabase();
$calculator = new Calculator($form_data, Parser::getBase());