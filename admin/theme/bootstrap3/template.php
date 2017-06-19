<?php
/****************************************************
*
* @File:      template.php
* @Package:   creARTive.CMS
* @Action:    Bootstrap theme 3.3.7
*
*****************************************************/
session_start();
if ($_SESSION["auth_user"] == 1) {
  $login = "no";
}
else {
  header("Location: index.php?p=login");
}
?>
<!DOCTYPE html>
<?php include('header.inc.php'); ?>

  <?php 
  if ($login == "yes") {
    print getLogin("yes"); 
  }
  else {
    print getLogin("no"); 
  }
  ?>

    <nav class="navbar navbar-default">

      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="?p=homepage"><?php print $siteName; ?></a>
        </div>
            <ul class="nav navbar-nav">
              <li <?php if ($paramPage == 'admin'): print 'class="active"'; endif; ?>><a href="?p=admin">HOME</a></li>
              <li <?php if ($paramPage == 'permalinks'): print 'class="active"'; endif; ?>><a href="?p=permalinks">PERMALINKS</a></li>
              <li <?php if ($paramPage == 'resources'): print 'class="active"'; endif; ?>><a href="?p=resources">RISORSE</a></li>
              <li <?php if ($paramPage == 'menu'): print 'class="active"'; endif; ?>><a href="?p=menu">MENU</a></li>
			        <!--                            
              <li <?php if ($paramPage == 'sidebar'): print 'class="active"'; endif; ?>><a href="?p=sidebar">SIDEBAR</a></li>
              <li <?php if ($paramPage == 'settings'): print 'class="active"'; endif; ?>><a href="?p=settings">SETTINGS</a></li>
              <li <?php if ($paramPage == 'profile'): print 'class="active"'; endif; ?>><a href="?p=profile">PROFILO</a></li>
              -->
            </ul>
              <button class="btn btn-danger navbar-btn navbar-right" data-toggle="modal" data-target="#logout"> ESCI </button>
      </div>

    </nav>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- LOGIN -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

        <div class="modal-header" style="padding:35px 50px;">
          <!--
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          -->
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>

        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="admin/data/pages/login/check_in.php" method="post">
            <div class="form-group">
              <label for="username"><span class="glyphicon glyphicon-user"></span> Nome Utente</label>
              <input type="text" class="form-control" id="username" name="username" disabled="" value="Admin">
            </div>
            <div class="form-group">
              <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Scrivi la password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Ricordami</label>
            </div>
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off" ></span> Login</button>
          </form>
        </div>

        <div class="modal-footer">
          <!--
          <button href="index.php" type="submit" class="btn btn-danger btn-default pull-left"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          -->
          <p><a href="index.php" class="btn btn-danger btn-default pull-left" target="_blank"><span class="glyphicon glyphicon-remove"></span> Cancel</a></p>
          <p>Non sei ancora registrato? <a href="#">Registrati</a></p>
          <p><a href="#">Password</a> dimenticata ?</p>
        </div>

        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->    

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->

		<div class="container">
            <div>
              <ul class="list-group">
                <li class="list-group-item"><?php print 'SITE: ' . $siteNamePath; ?></li>
              </ul>
            </div>
            <h1><?php if ($ifTitle == "yes") : print $title; endif; ?></h1>
	    <?php include($page2include); ?>

<!-- Modal -->
  <div class="modal fade" id="logout" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sessione amministrativa: Confermi l'uscita ?</h4>
        </div>
        <div class="modal-body text-center">
          <p>
            <a href="#" class="btn btn-success btn-lg" data-dismiss="modal">No, rimango qui.</a>
            <a href="admin/data/pages/login/check_out.php" class="btn btn-danger btn-lg">Si, voglio uscire!</a>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>      

<script>
function myFunction() {
    $("#myModal").modal({backdrop: "static"});
}
</script>


<?php include('footer.inc.php'); ?>
