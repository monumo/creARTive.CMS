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
  header("Location: index.php?p=admin");
}
?>
<!DOCTYPE html>
<?php include('header.inc.php'); ?>

  <?php 
    print getLogin("yes"); 
  ?>


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
          <a href="index.php" class="close">&times;</a>
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
          <p><a href="index.php" class="btn btn-danger btn-default pull-left"><span class="glyphicon glyphicon-remove"></span> Cancel</a></p>
          <p>Non sei ancora registrato? <a href="#">Registrati</a></p>
          <p><a href="#">Password</a> dimenticata ?</p>
        </div>

        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->    

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->


<script>
function myFunction() {
    $("#myModal").modal({backdrop: "static"});
}
</script>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php print $themepath?>assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php print $themepath . 'js/'?>bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php print $themepath . 'assets/js/'?>ie10-viewport-bug-workaround.js"></script>

  </body>
</html>

