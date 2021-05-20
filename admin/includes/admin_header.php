<?php include "../includes/db.php"; ?>
<?php include "admin_functions.php"; ?>

<?php ob_start(); ?>
<?php session_start(); ?>

<?php

if ($_SESSION['user_role'] !== 'admin') {
    $_SESSION['username'] = null;
    $_SESSION['firstname'] = null;
    $_SESSION['lastname'] = null;
    $_SESSION['user_role'] = null;

    echo '<script>
        window.location.href="../index.php";
        alert("No PERMISSION TO ENTER ADMIN PAGE...");
        </script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Blog">
    <meta name="author" content="Len Chen">

    <title>Blogion Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body>