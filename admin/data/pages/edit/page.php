<?php
$_page = $paramEdit;
$_path = $dataSitesPath . $siteNamePath . 'paths/' . $paramEdit . '.path.php'; 
include($_path);
$_pagePath = $dataPagesPath . $pagePath;
include($_pagePath . 'config.php');
$pageContent = file_get_contents($_pagePath . 'page.php');
?>

<form class="formsavepage">
    <div class="form-group">
        <label for="titlepage">Titolo:</label>
        <input type="text" class="form-control" id="titlepage" name="titlepage" value="<?php print $title; ?>">
        <input type="hidden" class="form-control" id="pagename" name="pagename" value="<?php print $_page; ?>">
    </div>
    <div class="form-group">
        <label for="textpage">Testo:</label>
            <textarea class="form-control" rows="15" id="textpage" name="textpage"><?php print $pageContent; ?></textarea>
    </div>
    <div class="row">
        <div class="col-xs-8">
        </div>
        <div class="col-xs-2">
                <a href="?v=<?php print $_page; ?>" class="btn btn-info btn-block" target="_blank">View</a>
        </div>
        <div class="col-xs-2">
            <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-save" ></span> Salva </button>
        </div>
        
    </div>        
</form>
<div id="report" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">PAGE-SAVE: Report dei dati salvati</h3>
                <br>
                    <div>
                        <ul class="list-group">
                            <li class="list-group-item"><div id="result" class="text-center"></div></li>
                        </ul>
                    </div>
            </div>
            <div class="modal-body text-center">
                <p>
                    <a href="?v=<?php print $_page; ?>" class="btn btn-info btn-md" target="_blank">Visualizza</a>
                    <a href="#" class="btn btn-success btn-md" data-dismiss="modal">Continua</a>
                </p>
                <div>
                <!--
                    <p id="page"></p>
                    <p id="where"></p>
                    <p id="return"></p>
                -->
                </div>
            </div>
        </div>
    </div>
</div>
