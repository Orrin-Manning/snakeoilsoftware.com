<?php

require_once 'functions.inc.php';

// Guard against missing form submission
if (!isset($_POST['submit']))
{
  header('location: /contact/');
  exit();
}

// Read variables from post request
$name = $_POST['name'];
$email = $_POST['email'];
$organization = $_POST['organization'];
$role = $_POST['role'];
$description = $_POST['description'];

// Guard against empty form data
if (emptyForm($name, $email, $organization, $role, $description))
{
  header('location: /contact/?error=emptyForm');
  exit();
}

// Guard against invalid email address
if (invalidEmail($email))
{
  header('location: /contact/?error=invalidEmail');
  exit();
}

// Get connection to the database
require_once 'dbh.inc.php';