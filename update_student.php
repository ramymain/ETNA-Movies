<?php
function	prompt_new_name($login, $db)
{
  $name = 1;
  $collection = $db->createCollection('students');

  while (!preg_match("/^[a-zA-Z ]+$/", $name))
    {
      echo "New name ? (Ex : Dupont Jean)\n";
      $name = readline("> ");
    }
  $collection->update(array("login" => $login),
		      array('$set' => array("name" => $name)));
  echo "User informations modified !\n";
}

function	prompt_new_age($login, $db)
{
  $age = -1;
  $collection = $db->createCollection('students');

  while (!preg_match("/^[1-9]$|^[1-9][0-9]$/", $age))
    {
      echo "New Age ? (de 1 a 99)\n";
      $age = readline("> ");
    }
  $collection->update(array("login" => $login),
		      array('$set' => array("age" => $age)));
  echo "User informations modified !\n";
}

function	prompt_new_email($login, $db)
{
  $email = 1;
  $collection = $db->createCollection('students');
  $pattern = "/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";

  while (!preg_match($pattern, $email))
    {
      echo "New Email ?\n";
      $email = readline("> ");
    }
  $collection->update(array("login" => $login),
		      array('$set' => array("email" => $email)));
  echo "User informations modified !\n";
}

function	prompt_new_phone($login, $db)
{
  $phone = 1;
  $collection = $db->createCollection('students');

  while (!preg_match("/^0([0-9]{9})$/", $phone))
    {
      echo "New phone number ?\n";
      $phone = readline("> ");
    }
  $collection->update(array("login" => $login),
		      array('$set' => array("phone" => $phone)));
  echo "User informations modified !\n";
}