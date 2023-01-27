<?php 
if(!isset($_COOKIE['espbuser'])){
  header("Location: login.php");
}
else{
  include('class/user.php');
  include('class/candidature.php');
  include('class/curses.php');
  $email =$_SESSION['useremail'];
  $user_level=$_SESSION["user_level"];
  $user_id=$_SESSION['user_id'];
  $user = new User();
  $userData=$user->getUserByEmail($email);
  
}