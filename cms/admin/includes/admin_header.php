<?php include("../includes/db.php");?>
<?php include("functions.php"); ?>
<?php ob_start(); ?>    <!-- Output Buffer -->
<?php session_start(); ?>

<?php 

    if (!isset($_SESSION['user_role']))
    {
       
        header("Location: ../index.php");

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Admin CSS -->
    <link href="css/bootstrap-admin.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/admin.css">

    <!-- Custom Icons -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Google Fonts CDN -->
    <link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu:400,700" rel="stylesheet">
     
     <link rel="stylesheet" type="text/css" href="css/style.css">
     
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   
    <script src="https://cdn.ckeditor.com/ckeditor5/10.1.0/classic/ckeditor.js"></script>
</head>

<body>