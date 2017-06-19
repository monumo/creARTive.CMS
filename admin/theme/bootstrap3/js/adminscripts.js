$(document).ready(
    function(){
        $('form.formsavepage').submit(
            function() {
                //$("#inizio").html('Eseguo il salvataggio...');
                var $result			= $('#result'),
                    $pagename       = $('#pagename').val(),
                    $titlepage      = $('#titlepage').val(),
                    $textpage       = $('#textpage').val();
                $.post(
                   'admin/data/pages/edit/save.php',
                   {
                        pagename  : $pagename,
                        titlepage : $titlepage,
                        textpage  : $textpage
                   },
                   function(response){
                       var data = jQuery.parseJSON(response);
                       //$("#return").html(response);
                       if (data.result == 'OK') {
                           $result.html('<div class="alert alert-success fade-in"><h3>La pagina è stata salvata correttamente.</h3></div>');
                           //$result.html('<div class="alert alert-danger fade-in"><h3>Problema durante il salvataggio della pagina.</h3></div>');
                           //$("#page").html(data.page);
                           //$("#where").html(data.where);
                       }
                       else {
                           $result.html('<div class="alert alert-danger fade-in"><h3>Problema durante il salvataggio della pagina.</h3></div>');
                       }
                       $('#report').modal('show');
                   }
                );
                return false; //https://stackoverflow.com/questions/9347282/using-jquery-preventing-form-from-submitting            
            }
        );
    }
);

$(document).ready(
    function(){
        $('form.form_menu_edit').submit(
            function() {
                var $result			= $('#result'),
                    $textmenu       = $('#textmenu').val();
                $.post(
                   'admin/data/pages/menu/menusave.php',
                   {
                        textmenu  : $textmenu
                   },
                   function(response){
                       $result.html(response);
                       $('#report_menu_save').modal('show');
                   }
                );
                return false; 
            }
        );
    }
);

$(document).ready(
    function(){
        $('form.form_new_folder').submit(
            function() {
                var $result			  = $('#result'),
                    $foldername       = $('#foldername').val();
                    $pathname         = $('#path-folder').text();
                $.post(
                   'admin/data/pages/resources/folder_create.php',
                   {
                        foldername  : $foldername,
                        pathfolder  : $pathname
                   },
                   function(response){
                       $result.html(response);
                   }
                );
                return false;
            }
        );
    }
);

$(document).ready(
    function(){
        $('form.form_delete_folder').submit(
            function() {
                var $result			  = $('#result2'),
                    $pathname         = $('#pathfolder2delete').text();
                $.post(
                   'admin/data/pages/resources/folder_delete.php',
                   {
                        pathfolder  : $pathname
                   },
                   function(response){
                       $result.html(response);
                   }
                );
                return false;
            }
        );
    }
);

$(document).ready(
    function(){
        $('form.form_new_page').submit(
            function() {
                var $result			  = $('#result3'),
                    $folderpagename   = $('#folder-page-name').text(),
                    $pathpage         = $('#path-page').text();
                $.post(
                   'admin/data/pages/resources/page_create.php',
                   {
                        folderpagename : $folderpagename,
                        pathfolder  : $pathpage
                   },
                   function(response){
                       $result.html(response);
                   }
                );
                return false;
            }
        );
    }
);

$(document).ready(
    function(){
        $('form.form_delete_page').submit(
            function() {
                var $result			         = $('#result4'),
                    $folderpage2delete       = $('#folderpage2delete').text(),
                    $pathfolderpage2delete   = $('#pathfolderpage2delete').text();
                $.post(
                   'admin/data/pages/resources/page_delete.php',
                   {
                        folderpagename : $folderpage2delete,
                        pathfolder     : $pathfolderpage2delete
                   },
                   function(response){
                       $result.html(response);
                   }
                );
                return false;
            }
        );
    }
);

$(document).ready(
    function(){
        $('form.form_cfg_page').submit(
            function() {
                var $result			         = $('#result5'),
                    $cfgpage                 = $('#cfgpage').text(),
                    $cfgpagefolder           = $('#cfgpagefolder').text();
                $.post(
                   'admin/data/pages/resources/page_attr_change.php',
                   {
                        cfgpage           : $cfgpage,
                        cfgpagefolder     : $cfgpagefolder
                   },
                   function(response){
                       $result.html(response);
                   }
                );
                return false;
            }
        );
    }
);
