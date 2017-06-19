<?php
/****************************************************
*
* @File:      footer.inc.php
* @Package:   freeXstudio
* @Action:    Template
*
*****************************************************/
?>
      <hr>

			<footer>
                <?php if ($bs != "none") : ?>
                  <p>
                  <a href="http://creartivecms.com">CreARTive.CMS</a> - 
                  <a href="http://getbootstrap.com/">Twitter-Bootstrap</a> - (<?php print $bs;?> theme) - <a href="http://twincode.it" target="_blank">(C) 2017 - Twincode.it</a></p>
                <?php else: ?>
                  <p>
                  <a href="http://creartivecms.com">CreARTive.CMS</a> -           
                  <a href="http://getbootstrap.com/">Twitter-Bootstrap</a> theme - <a href="http://twincode.it" target="_blank">(C) 2017 - Twincode.it</a></p>
                <?php endif; ?>
			</footer>


<script>
</script>
      

		<!--</div>--><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script type="text/javascript" src="<?php print $themepath . 'js/'?>bootstrap.min.js"></script>    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php print $themepath . 'assets/js/'?>ie10-viewport-bug-workaround.js"></script>

  </body>
</html>
