<?php
require_once('add_student.php');
require_once('update_student.php');
require_once('show_student.php');

function	func_add_student($argv, $db)
{
  $collection = $db->createCollection('students');
  $pattern = "/^[a-z]{2,6}_[0-9]$|^[a-z]{2,6}_[a-z]$/";

  if (!isset($argv[2]) || !preg_match($pattern, strtolower($argv[2])))
    echo "Error: Login not valid (xxxxxx_x)\n";
  else if (!empty($collection->findOne(array('login' => strtolower($argv[2])))))
    echo "Error: Login already exist\n";
  else
    {
      $login = strtolower($argv[2]);
      $name = prompt_name();
      $age = prompt_age();
      $email = prompt_email();
      $phone = prompt_phone();
      add_to_db($db, $login, $name, $age, $email, $phone);
    }
}

function	func_del_student($argv, $db, $name = 'a')
{
  $collection = $db->createCollection('students');
  $pattern = "/^[a-z]{2,6}_[0-9]$|^[a-z]{2,6}_[a-z]$/";

  if (!isset($argv[2]) || !preg_match($pattern, strtolower($argv[2])))
      echo "Error: Login not valid (xxxxxx_x)\n";
  else if (empty($collection->findOne(array('login' => strtolower($argv[2])))))
      echo "Error: Login not found\n";
  else
    {
      $login = strtolower($argv[2]);
      echo "Are you sure ? (yes/no)\n";
      while ($name !== "yes" && $name !== "no" &&
	     $name !== "oui" && $name !== "non")
	$name = strtolower(readline("> "));
      if ($name === "yes")
	{
	  $collection->remove(array('login' => $login));
	  echo "User deleted !\n";
	}
      else
	echo "User not deleted !\n";
    }
}

function	func_update_student($argv, $db, $choice = 1)
{
  $collection = $db->createCollection('students');
  $pattern = "/^[a-z]{2,6}_[0-9]$|^[a-z]{2,6}_[a-z]$/";

  if (!isset($argv[2]) || !preg_match($pattern, strtolower($argv[2])))
    echo "Error: Login not valid (xxxxxx_x)\n";
  else if (empty($collection->findOne(array('login' => strtolower($argv[2])))))
    echo "Error: Login doesn't exist\n";
  else
    {
      $login = strtolower($argv[2]);
      while ($choice !== "name" && $choice !== "age" &&
	     $choice !== "email" && $choice !== "phone")
	{
	  echo "What do you want to update ?\n";
	  $choice = strtolower(readline("> "));
	}
      if ($choice == "name")
	prompt_new_name($login, $db);
      else if ($choice == "age")
	prompt_new_age($login, $db);
      else if ($choice == "email")
	prompt_new_email($login, $db);
      else if ($choice == "phone")
	prompt_new_phone($login, $db);
    }
}

function	func_show_student($argv, $db)
{
  $collection = $db->createCollection('students');
  $pattern = "/^[a-zA-Z]{2,6}_[0-9]$|^[a-zA-Z]{2,6}_[a-zA-Z]$/";

  if (isset($argv[2]) && preg_match($pattern ,$argv[2]))
    {
      if (empty($collection->findOne(array('login' => strtolower($argv[2])))))
	echo "Error: Login doesn't exist\n";
      else
	  prompt_student($argv, $collection);
    }
  else if (!isset($argv[2]))
      prompt_students($collection);
  else
      echo "Error: Veuillez entrer un login correct(xxxxxx_x)\n";
}