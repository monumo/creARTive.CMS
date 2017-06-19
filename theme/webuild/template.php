<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Valentino Stampone">

    <title>CreARTive.CMS</title>

    <!-- Bootstrap -->
    <link href="<?php print $themepath;?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php print $themepath;?>assets/css/bootstrap-theme.css" rel="stylesheet">
    <link href="<?php print $themepath;?>assets/css/font-awesome.css" rel="stylesheet">

    <!--  -->
    <link href="<?php print $themepath;?>assets/css/style.css" rel="stylesheet">
    
    
  </head>

  <body>

	<div id="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>CreARTive.CMS</h1>
					<h2 class="subtitle">Simple Flat File Content Management System, file-system based, for individuals who need a small sized websites.</h2>
	            			<h2 class="subtitle">Beta Version 1.0.0</h2>
				</div>
            </div>
            <br>
            <div class="row">
                    <a href="index.php?p=homepage" class="btn btn-primary btn-lg">
                        <span class="glyphicon glyphicon-edit"></span> Live preview </a>
                    <a href="index.php?p=admin" class="btn btn-danger btn-lg">
                        <span class="glyphicon glyphicon-wrench"></span> Admin (Demo) </a>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div>
                        <p><a href="http://twincode.it/">&copy; Twincode.it - All Rights Reserved</a></p>
                    </div>
                </div>
            </div>		
        </div>
	</div>

      
    
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="<?php print $themepath;?>assets/js/bootstrap.min.js"></script>
	<script src="<?php print $themepath;?>assets/js/jquery.countdown.min.js"></script>
	<script type="text/javascript">
        $('#countdown').countdown('2017/06/19', function(event) {
          $(this).html(event.strftime('%w weeks %d days <br /> %H:%M:%S'));
        });
    </script>
  
 
</body>
</html>
