<?php

function	func_rent_movie($argv, $db)
{
  $collection_students = $db->createCollection('students');
  $collection_movies = $db->createCollection('movies');
  $pattern = "/^[a-z]{2,6}_[0-9]$|^[a-z]{2,6}_[a-z]$/";
  if (!isset($argv[2]) || !isset($argv[3]))
    echo "Error: Please specify a login and a imdb code\n";
  else if (!preg_match($pattern, strtolower($argv[2])))
    echo "Error: Login not valid (xxxxxx_x)\n";
  else if (empty($collection_students->findOne(array('login' => strtolower($argv[2])))))
    echo "Error: Login doesn't exist\n";
  else if (empty($collection_movies->findOne(array('imdb_code' => strtolower($argv[3])))))
    echo "Error: imdb code doesn't exist\n";
  else
    {

    }
}