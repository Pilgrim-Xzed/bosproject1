<?php
    include "core/init.php";
    $settingsq ="SELECT * FROM `settings`";
    $runset =$con->query($settingsq);
    $setting=mysqli_fetch_assoc($runset);


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Borno State Budget and Planning</title>
<!-- CSS Files -->
<link href="assets/css/custom.css" rel="stylesheet">
<link href="assets/css/responsive.css" rel="stylesheet">
<link href="assets/css/color.css" rel="stylesheet">
<link href="assets/css/all.css" rel="stylesheet">
<link href="assets/css/owl.carousel.min.css" rel="stylesheet">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link rel="icon" href="images/fav.png" type="image/png">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

<style>
.logo-nav-row .navbar-brand {
    padding: 0px 0;

}
</style>
</head>
<body>
