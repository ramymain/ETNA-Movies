<?php
function	add_to_db($db, $login, $name, $age, $email, $phone)
{
  $collection = $db->createCollection('students');
  $doc = array(
	       "login" => $login,
	       "name" => $name,
	       "age" => $age,
	       "email" => $email,
	       "phone" => $phone
	       );

  $collection->insert($doc);
  echo "User registered !\n";
}

function	prompt_name()
{
  $name = 1;

  while (!preg_match("/^[a-zA-Z ]+$/", $name))
    {
      echo "Name ? (Ex : Dupont Jean)\n";
      $name = readline("> ");
    }
  return ($name);
}

function	prompt_age()
{
  $age = -1;

  while (!preg_match("/^[1-9]$|^[1-9][0-9]$/", $age))
    {
      echo "Age ? (de 1 a 99)\n";
      $age = readline("> ");
    }
  return ($age);
}

function	prompt_email()
{
  $email = 1;
  $pattern = "/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";

  while (!preg_match($pattern, $email))
    {
      echo "Email ?\n";
      $email = strtolower(readline("> "));
    }
  return ($email);
}

function	prompt_phone()
{
  $phone = 1;

  while (!preg_match("/^0([0-9]{9})$/", $phone))
    {
      echo "Phone number ?\n";
      $phone = readline("> ");
    }
  return ($phone);
}