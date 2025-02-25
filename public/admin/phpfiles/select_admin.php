<?php
  if (isset($_SESSION['admin_bigdata'])) {
    $admin_id = $_SESSION['admin_bigdata'];

    $sql = "select * from reg_admin where id = '$admin_id'";
    $query = mysqli_query($connect, $sql);
    if ($query) {
      $found = mysqli_fetch_array($query);
      $admin_id = $found['id'];
      $admin_fullname = $found['fullname'];
      $admin_username = $found['username'];
      $admin_security_key = $found['security_key'];
      $admin_level = $found['level'];
      $admin_password = $found['password'];
      $admin_email = $found['email'];
      $admin_gender = $found['gender'];
      $admin_phone = $found['phone'];
      $admin_address = $found['address'];
      $admin_qualification = $found['qualification'];
      $admin_programme = $found['programme'];
      $admin_salary = $found['salary'];
      $admin_block = $found['block'];
      $admin_status = $found['status'];
      $admin_keep_logged_in = $found['keep_logged_in'];
      $admin_date_reg = $found['date_reg'];
      $admin_time_reg = $found['time_reg'];
    }
  }

 ?>
