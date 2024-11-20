<?php include("includes/config.php"); ?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?><?= $divider; ?><?= $sitename; ?></title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
</head>

<body>
    <div class="container">
        <header id="main-header" class="frontpage">
            <a href="index.html">
                <h1>PHP Demo</h1>
            </a>
        </header>
        <?php include("includes/mainmenu.php"); ?> 
        <main>