<?php
$menuContent = file_get_contents($componentPath . 'menu.php');
?>

<form class="form_menu_edit">
    <div class="form-group">
        <label for="textmenu">Menù Template:</label>
            <textarea class="form-control" rows="15" id="textmenu" name="textmenu"><?php print $menuContent; ?></textarea>
    </div>
    <div class="row">
        <div class="col-xs-8">
        </div>
        <div class="col-xs-2">
                <a href="?p=homepage" class="btn btn-info btn-block" target="_blank">View</a>
        </div>
        <div class="col-xs-2">
            <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-save" ></span> Salva </button>
        </div>
        
    </div>        
</form>


<div id="report_menu_save" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">MENU-SAVE: Report dei dati salvati</h3>
                <br>
                <div id="result" class="text-center"></div>
            </div>
            <div class="modal-body text-center">
                <p>
                    <a href="?v=homepage" class="btn btn-info btn-md" target="_blank">Visualizza</a>
                    <a href="#" class="btn btn-success btn-md" data-dismiss="modal">Continua</a>
                </p>
                <div>
                    <p id="where"></p>
                </div>
            </div>
        </div>
    </div>
</div>
