<?php
/****************************************************
*
* @File:      header.inc.php
* @Package:   creARTive.CMS
* @Action:    Template
*
*****************************************************/
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="CreARTive.CMS, Simple Flat File Content Management System, file-system based, for individuals who need a small sized websites.">
    <meta name="author" content="Valentino Stampone">
    <link rel="icon" href="favicon.ico">

	<title><?php print $title;?></title>

  <?php if ($bs == "none") : ?>
    <!-- Bootstrap core CSS -->
    <link href="<?php print $themepath . 'css/';?>bootstrap.min.css" rel="stylesheet">
  <?php else : ?>
    <!-- bootswatch.com -->
    <link href="<?php print $themepath . 'bootswatch/bootstrap_' . $bs . '.css';?>" rel="stylesheet">
  <?php endif; ?>

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="<?php print $themepath . 'assets/css/';?>ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php print $themepath;?>starter-template.css" rel="stylesheet">
  
  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="<?php print $themepath . 'assets/js/';?>ie-emulation-modes-warning.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
