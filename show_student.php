<?php

function prompt_student($argv, $collection)
{
  $login = array('login' => strtolower($argv[2]));
  $cursor = $collection->find($login);

  foreach ($cursor as $doc)
    {
      echo "Login : ".$doc['login']."\nName  : ".$doc['name']."\n";
      echo "Age   : ".$doc['age']."\nEmail : ".$doc['email']."\n";
      echo "Phone : ".$doc['phone']."\n";
    }
}

function prompt_students($collection)
{
  $i = 0;
  $cursor = $collection->find();

  foreach ($cursor as $doc)
    {
    echo $doc['login']." ".$doc['name']." ".$doc['age']." ".$doc['email']." ".$doc['phone']."\n";
    ++$i;
    }
  echo "*" . $i . "*\n";
}