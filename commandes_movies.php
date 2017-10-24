<?php
require_once('show_movies.php');

function	add_movies_col($db, $movies)
{
  $collection = $db->createCollection('movies');
  $random = rand(0,5);
  $doc = array(
	       "imdb_code" => $movies[1],
	       "title" => $movies[5],
	       "year" => $movies[11],
	       "genres" => $movies[12],
	       "directors" => $movies[7],
	       "rate" => $movies[9],
	       "link" => $movies[15],
	       "stock" => $random
	       );
  $collection->insert($doc);
}

function	func_movies_storing($argv, $db)
{
  $i = 0;
  if (($handle = fopen("movies.csv", "r")) !== FALSE)
    {
      $firstline = fgetcsv($handle, 1000, ",");
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
	{
	  $num = count($data);
	  for ($c=1; $c < $num; $c+=16)
	    $movies[$c] = $data[$c];
	  for ($c=5; $c < $num; $c+=16)
	    $movies[$c] = $data[$c];
	  for ($c=11; $c < $num; $c+=16)
	    $movies[$c] = $data[$c];
	  for ($c=12; $c < $num; $c+=16)
	    $movies[$c] = explode(", ", $data[$c]);
	  for ($c=7; $c < $num; $c+=16)
	    $movies[$c] = explode(", ", $data[$c]);
	  for ($c=9; $c < $num; $c+=16)
	    $movies[$c] = $data[$c];
	  for ($c=15; $c < $num; $c+=16)
	    $movies[$c] = $data[$c];
	  $i++;
	  add_movies_col($db, $movies);
	}
      echo $i." movies successfully stored !\n";
      fclose($handle);
    }
}

function	func_show_movies($argv, $db)
{
  if (!isset($argv[2]))
    asc_sort($db);
  else if (strtolower($argv[2]) != "desc" && strtolower($argv[2]) != "genre"
	   && strtolower($argv[2]) != "year" && strtolower($argv[2]) != "rate")
    echo "Error: Wrong command\n";
  else
    {
      $fonction = strtolower($argv[2]) . "_sort";
      $fonction($db, $argv);
    }
}