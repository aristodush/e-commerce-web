<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  //include connection file
error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/img/icon.png">
    <title>Group 9</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">




    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> </head>

<body class="home">

        <!--header starts-->
        <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/beverage-picky-logo.png" alt=""> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                          <li class="nav-item" style="border:none"> <form class="nav-link active searchf" action="search.php" method="POST"><input type="text" name="search" placeholder="Search Drink.." value=""> </form> </li>
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="counters.php">Merchandise <span class="sr-only"></span></a> </li>
                            <?php
                            $userperson = $_SESSION["user_id"];
                            $ssql ="select * from users where u_id='$userperson'";
                                     $res=mysqli_query($db, $ssql);
                                     $newrow=mysqli_fetch_array($res);?>

                            							<?php
                            													if(empty($_SESSION["user_id"]))
                            							{
                            								echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
                            							  <li class="nav-item"><a href="registration.php" class="nav-link active">Sign Up</a> </li>';
                            							}
                            						else
                            							{

                            										echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active"><i class="fa fa-shopping-cart"></i> Orders</a> </li>';
                            									echo  '<li class="nav-item"><a href="update.php" class="nav-link active" title = "Update profile"><i class="fa fa-user"></i> '.$newrow['username'].'</a></li>';
                                              echo  '<li class="nav-item"><a href="logout.php" class="nav-link active" title = "logout">Logout</a> </li>';
                            							}

                            						?>
