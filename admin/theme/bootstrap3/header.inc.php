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
    <meta name="description" content="">
    <meta name="author" content="">

	<title><?php print $title;?></title>

    <script type="text/javascript" src="<?php print $themepath;?>js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?php print $themepath;?>js/adminscripts.js"></script>


    <!-- Bootstrap core CSS -->
    <!--
    <link href="<?php print $themepath . 'css/';?>bootstrap.min.css" rel="stylesheet">
    -->

    <link href="<?php print $themepath . 'bootswatch/bootstrap_darkly.css';?>" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php print $themepath . 'assets/css/';?>ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php print $themepath . 'assets/js/';?>ie-emulation-modes-warning.js"></script>
    <!--
    <script>window.jQuery || document.write('<script src="<?php print $themepath; ?>assets/js/vendor/jquery.min.js"><\/script>')</script>
    -->
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
