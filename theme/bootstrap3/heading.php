<?php
/****************************************************
*
* @File:      heading.php
* @Package:   creARTive.CMS
* @Action:    Bootstrap theme 3.3.7
*
*****************************************************/
?>
<!DOCTYPE html>
<?php include('header.inc.php'); ?>
  <body>

  <?php include($componentPath . 'menu.php'); ?>

		<div class="container">
      <br>
        <p>
        	<h1><?php if ($ifTitle == "yes") : print $title; endif; ?></h1>
        </p>
      <br>
	    <?php include($page2include); ?>

<?php include('footer.inc.php'); ?>

