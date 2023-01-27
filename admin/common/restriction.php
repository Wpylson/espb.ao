<?php 
if(!isset($_COOKIE['espbadm'])){
  header("Location: ../login.php");
}
else{
  include('../class/user.php');
  $email =$_SESSION['useremail'];
  $user_level=$_SESSION["user_level"];
  $user = new User();
  $userData=$user->getUserByEmail($email);
  
}
