#!/usr/bin/php
<?php

require_once('commandes_students.php');
require_once('commandes_movies.php');
require_once('commandes_location.php');
//require_once('add_student.php');
//require_once('update_student.php');
//require_once('commandes2.php');

$c = new MongoClient();
$db = $c->db_etna;

if ($argc != 2 && $argc != 3 && $argc != 4)
  {
    echo "Error: Pas assez d'argument ou trop d'argument\n";
    return (false);
  }
$fonction = 'func_' . $argv[1];
if (function_exists($fonction))
  $fonction($argv, $db);
else
  {
    echo "Error: Function not found\n";
    return (false);
  }