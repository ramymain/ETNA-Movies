<?php

function	asc_sort($db)
{
  $i = 0;
  $collection = $db->createCollection('movies');
  $cursor = $collection->find();
  $cursor->sort(array("title" => 1));
  foreach ($cursor as $doc)
    {
      echo $doc["imdb_code"] .  " - " . $doc["title"] . "\n";
      ++$i;
    }
  echo "*" . $i . "*\n";
}

function	desc_sort($db)
{
  $i = 0;
  $collection = $db->createCollection('movies');
  $cursor = $collection->find();
  $cursor->sort(array("title" => -1));
  foreach ($cursor as $doc)
    {
      echo $doc["imdb_code"] .  " - " . $doc["title"] . "\n";
      ++$i;
    }
  echo "*" . $i . "*\n";
}

function	genre_sort($db, $argv)
{
  if (!isset($argv[3]))
    echo "Please specify a genre\n";
  else
    {
      $i = 0;
      $collection = $db->createCollection('movies');
      $genre = array('genres' => strtolower($argv[3]));
      $cursor = $collection->find($genre);
      $cursor->sort(array("title" => 1));
      foreach ($cursor as $doc)
	{
	  echo $doc["imdb_code"] .  " - ";
	  echo $doc["title"] . "\n";
	  ++$i;
	}
      if ($i > 0)
	echo "*" . $i . "*\n";
      else
	{
	echo "You can only use this genre : action, adventure, animation,";
	echo " biography, comedy, crime, drama, family, fantasy, history,";
	echo " horror, musical, mystery, romance, sci-fi, sport, thriller,";
	echo " war, western.\n";
	}
    }
}

function	year_sort($db, $argv)
{
  if (!isset($argv[3]))
    echo "Please specify a year\n";
  else if ($argv[3] < 1936 || $argv[3] > 2016)
    echo "Please enter a valid year (between 1936 and 2015)\n";
  else
    {
      $i = 0;
      $collection = $db->createCollection('movies');
      $year = array('year' => $argv[3]);
      $cursor = $collection->find($year);
      $cursor->sort(array("title" => 1));
      foreach ($cursor as $doc)
	{
	  echo $doc["imdb_code"] .  " - ";
	  echo $doc["title"] . "\n";
	  ++$i;
	}
	echo "*" . $i . "*\n";
    }
}

function	rate_sort($db, $argv)
{
  if (!isset($argv[3]))
    echo "Please specify a rate (Between 0 and 9)\n";
  else if ($argv[3] > 9 || $argv[3] < 0)
    echo "Only rate between 0 and 9\n";
    else
      {
  $value = $argv[3];
  $i = 0;
  $collection = $db->createCollection('movies');
  $range = array( 'rate' => array( '$gte' => $value ));
  $cursor = $collection->find($range);
  $cursor->sort(array("title" => 1));
  foreach ($cursor as $doc)
    if ($doc['rate'] < $value + 1)
      {
	echo $doc["imdb_code"] .  " - ";
	echo $doc["title"] . " (".$doc['rate'].")\n";
	++$i;
      }
  echo "*" . $i . "*\n";
      }
}