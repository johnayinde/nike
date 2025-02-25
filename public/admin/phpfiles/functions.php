<?php

function checkinput($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function checklogged()
{
  if (isset($_SESSION['admin_bigdata'])) {
    header("location: index.php");
  }
}

function checknotlogged()
{
  if (!isset($_SESSION['admin_bigdata'])) {
    header("location: login.php");
  }
}

?>
