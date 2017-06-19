<?php
?>
<div>
<h2></h2>
</div>
<?php
function scan_directory_recursively($directory, $filter=FALSE)
{
	global $vv, $putLabel, $siteNamePath, $listFolder, $firstLevelFolder, $pathFolder;
	$if_config = 'no';
	$if_path = 'no';
    //
	if(substr($directory,-1) == '/')
	{
		$directory = substr($directory,0,-1);
	}
	if(!file_exists($directory) || !is_dir($directory))
	{
		return FALSE;
	}elseif(is_readable($directory))
	{
		$directory_tree = array();
		$directory_list = opendir($directory);
		while($file = readdir($directory_list))
		{
			if($file != '.' && $file != '..')
			{
				$path = $directory.'/'.$file;
				if(is_readable($path))
				{
					$subdirectories = explode('/',$path);
					if(is_dir($path))
					{
						$vv = $vv + 1; print '<!-- (+1) vv = ' . $vv . '-->' . PHP_EOL;
                        print '<ul> <!-- (o) -->' . PHP_EOL;
                        print ' <li> <!-- INIZIO ELEMENTO -->' . PHP_EOL;
                        $elem = end($subdirectories);
						$listFolder[] = $elem;
						$pathFolder[$elem] = $path;
						if ($vv == 1) { print '<!-- (==) vv = ' . $vv . ' LABEL -->' . PHP_EOL;
                            $putLabel = 1;
                            $label = str_replace('.',"",$elem);
							$firstLevelFolder[] = $label . '_';
							print '<a name="' . $label . '_' . '">' . '[' . $elem . ']'. '</a>' . PHP_EOL;
						}
                        print '    <p class="bs-component"> <!-- BS-COMPONENT Apertura! ' . $elem . '--> ' . PHP_EOL; 
                        print '     <a href="?p=resources&s='.$elem.'" class="btn btn-primary btn-xs">' . end($subdirectories) . '</a> ' . PHP_EOL; 
                        $exists = 'data/sites/' . $siteNamePath . 'paths/' . $elem . '.path.php';
						$if_path = 'no';
                        if (file_exists($exists)) {
                            $ret = 'Pagina Raggiungibile ' . '[' . $path . '] : ' . $exists;
                            $cfg = $path . '/' . 'config.php';
                            if (file_exists($cfg)) {
                                include($path . '/' . 'config.php');
								print '     <a href="#" id="cfg-'.$elem.'" class="btn btn-default btn-xs">' . 'Attributi' . '</a> ' . PHP_EOL;
								print '     <a href="?p=edit&e=' . $elem . '" class="btn btn-success btn-xs">' . 'Modifica_Pagina' . '</a> ' . PHP_EOL;
                                print '     <a href="#" id="dp-'.$elem.'" class="btn btn-danger btn-xs">' . 'Cancella_Pagina' . '</a> ' . PHP_EOL;
								print '     <a href="?p=' . $elem . '" class="btn btn-info btn-xs" target="_blank">' . 'Visualizza' . '</a> ' . PHP_EOL;
		                        print '    </p> <!-- BS-COMPONENT Chiusura! -->' . PHP_EOL; 
								print '    <div class="alert alert-success">' . PHP_EOL;
								print '         TITLE:          "' . $title . '" <br>' . PHP_EOL;
								print '         THEME:          "' . $theme . '" <br>' . PHP_EOL;
								print '         DATE / TIME:                     <br>' . PHP_EOL;
								print '    </div>' . PHP_EOL;
								$if_path = 'yes';
                            }
                        }
                        else {
                            $ret = 'Pagina NON Raggiungibile ' . '[' . $path . '] : ' . $exists;
							print '<!-- ' . $ret . ' -->' . PHP_EOL;
                                if ($vv == 1) {
                                    print '     <button type="button" class="btn btn-warning btn-xs" data-toggle="collapse" data-target="#' . $label . '">' . PHP_EOL;
                                    print '         <span class="glyphicon glyphicon-chevron-down"></span>' . PHP_EOL;
                                    print '     </button> ' . PHP_EOL;
                                }
								else {
									print '<!-- OPS vv = ' . $vv . ' -->' . PHP_EOL;
								}
								//
                                print '     <a href="#" id="nf-'.$elem.'" class="btn btn-warning btn-xs">' . 'Nuova_Cartella' . '</a> ' . PHP_EOL;
								print '     <a href="#" id="np-'.$elem.'" class="btn btn-info btn-xs">' . 'Aggiungi_Pagina' . '</a> ' . PHP_EOL;
                                print '     <a href="#" id="df-'.$elem.'" class="btn btn-danger btn-xs">' . 'Cancella_Cartella' . '</a> ' . PHP_EOL;
								//
								print '    </p> <!-- BS-COMPONENT Chiusura! -->' . PHP_EOL;
								
                        }
                        print ' </li> <!-- FINE ELEMENTO -->' . PHP_EOL;
						if ($vv == 1) { print '<!-- (==) vv = ' . $vv . ' open DIV -->' . PHP_EOL;
							if ($putLabel == 1): print '<div id="' . $label . '" class="collapse"> <!-- APRO IL GRUPPO -->' . PHP_EOL; endif;
						}
						print '<!-- /////// ENTRO vv = ' . $vv . '-->' . PHP_EOL;
						$directory_tree[] = array(
							'path'      => $path,
							'name'      => end($subdirectories),
							'kind'      => 'directory',
							'content'   => scan_directory_recursively($path, $filter));
						print '<!-- /////// ESCO vv = ' . $vv . '-->' . PHP_EOL;							
						if ($vv == 1) { print '<!-- (==) vv = ' . $vv . ' close DIV -->' . PHP_EOL;
							if ($putLabel == 1): print '</div> <!-- CHIUDO IL GRUPPO -->' . PHP_EOL; endif;
							$putLabel = 0;
						}
                        print '</ul> <!-- (o) -->' . PHP_EOL;						
						$vv = $vv - 1; print '<!-- (-1) vv = ' . $vv . '-->' . PHP_EOL;
					}elseif(is_file($path))
					{
						$extension = end(explode('.',end($subdirectories)));
						if($filter === FALSE || $filter == $extension)
						{
							$file_ = end($subdirectories);
                            print '<!-- FILE: ' . $file_ . ' -->' . PHP_EOL;
							//print '<li>[' . $file_ . ']</li>' . PHP_EOL;
							if ($file_ == 'config.php') : $if_config = 'yes'; endif;
							if ($file_ == 'page.php' && $if_config == 'yes' && $if_path == 'no') {
								$if_config = 'no';
							}
							$directory_tree[] = array(
							'path'		=> $path,
							'name'		=> end($subdirectories),
							'extension' => $extension,
							'size'		=> filesize($path),
							'kind'		=> 'file');
						}
					}
				}
				else {
					print '<!-- UNREADABLE -->' . PHP_EOL;
				}
			}
		}
		closedir($directory_list);
		return $directory_tree;
	}else{
		return FALSE;
	}
}
// ------------------------------------------------------------
?>
<div id="_help_" class="collapse">
Questa è la pagina per operare sul file-system che ospita le pagine del sito. Per eseguire le operazioni di questa pagina è necessario assicurarsi che si abbiano i diritti di accesso in scrittura alla cartella di sistema "data/".  <br>
Ricorda che:
<ul>
	<li>Per creare una nuova pagina è necessario prima creare la cartella che la ospita.</li>
	<li>Quando si crea una nuova pagina, quest'ultima sarà ospitata da una cartella con lo stesso nome ("permalink").</li>
	<li>Per la scelta del nome della cartella/permalink valgono le stesse regole suggerite per i nomi di cartelle. <br>
	Ad ogni modo si consiglia di separare le parole con il carattere "trattino" (segno meno oppure trattino basso) e limitare la lunghezza del nome del permalink a massimo 15 caratteri.</li>
	<li>Le cartelle si possono cancellare solo se sono vuote, quindi cancellare prima la pagina in essa contenuta.</li>
	<li>In caso si riscontrassero malfunzionamenti, scrivere alla seguente email: bugs@creartivecms.com</li>
</ul>
</div>
<br>
<?php
if ($paramSite == "root") {
	$dir = "data/pages/";
	$site = "ROOT";
}
else {
	$dir = "data/pages/" . $paramSite . '/';
	$site = $paramSite;
}
if (!isset($paramSite)) {
	$dir = 'data/pages/' . $siteNamePath;
	$sitepath = explode('/',$siteNamePath);
	$site = $sitepath[0];
}
$vv = 0;
$putLabel = 0;
$listFolder = array();
$firstLevelFolder = array();
$pathFolder = array();
print '<div class="row">' . PHP_EOL;
print '	<a href="#" class="btn btn-default btn-info btn-sm" data-toggle="collapse" data-target="#_help_"> HELP </a> ' . PHP_EOL;
print "</div>" . PHP_EOL;
print '<br>' . PHP_EOL;
print '<div class="row">' . PHP_EOL;
print ' <div class="col-sm-8">' . PHP_EOL;
print '     <a href="#" class="btn btn-default btn-sm">' . $site . '</a> ' . PHP_EOL;
if ($site == 'ROOT') {
}
else {
	print '     <a href="?p=resources&s=root" class="btn btn-default btn-sm">' . 'Vai a: Root' . '</a> ' . PHP_EOL;
}
print '  <ul>' . PHP_EOL;
print '   <ul>' . PHP_EOL;
print '   </ul>' . PHP_EOL;
$fileselection = scan_directory_recursively("$dir");
print "  </ul>" . PHP_EOL;
print " </div>" . PHP_EOL;
echo " [". count($fileselection) . "] Cartelle di primo livello: <br>";
print '<ul class="list-group">' . PHP_EOL;
print ' <div class="row">'  . PHP_EOL;
print '  <div class="col-xs-2">'. PHP_EOL;
foreach ($firstLevelFolder as $linkFolder) {
	print '     <li class="list-group-item"><a href="#'.$linkFolder.'">['.$linkFolder.']</a></li>' . PHP_EOL;
}
print '  <div>'  . PHP_EOL;
print ' <div>'  . PHP_EOL;
print '</ul>' . PHP_EOL;
//print_r($fileselection);
print '</div>' . PHP_EOL;
// ------------------------------------------------------------
print '<script>' . PHP_EOL;
print '$(document).ready(' . PHP_EOL;
print '		function () {' . PHP_EOL;
foreach ($listFolder as $folder) {
		print '			$("#nf-'.$folder.'").click(' . PHP_EOL;
		print '				function(){' . PHP_EOL;
		print '						$("#folder-name").html("'.$folder.'");' . PHP_EOL;
		print '						$("#path-folder").html("'.$pathFolder[$folder].'");' . PHP_EOL;
		print '						$("#new_folder").modal("show");' . PHP_EOL;
		print '				}' . PHP_EOL;
		print '			);' . PHP_EOL;
		print '			$("#df-'.$folder.'").click(' . PHP_EOL;
		print '				function(){' . PHP_EOL;
		print '						$("#folder2delete").html("'.$folder.'");' . PHP_EOL;
		print '						$("#pathfolder2delete").html("'.$pathFolder[$folder].'");' . PHP_EOL;
		print '						$("#delete_folder").modal("show");' . PHP_EOL;
		print '				}' . PHP_EOL;
		print '			);' . PHP_EOL;
		print '			$("#np-'.$folder.'").click(' . PHP_EOL;
		print '				function(){' . PHP_EOL;
		print '						$("#folder-page-name").html("'.$folder.'");' . PHP_EOL;
		print '						$("#path-page").html("'.$pathFolder[$folder].'");' . PHP_EOL;
		print '						$("#add_page").modal("show");' . PHP_EOL;
		print '				}' . PHP_EOL;
		print '			);' . PHP_EOL;
		print '			$("#dp-'.$folder.'").click(' . PHP_EOL;
		print '				function(){' . PHP_EOL;
		print '						$("#folderpage2delete").html("'.$folder.'");' . PHP_EOL;
		print '						$("#pathfolderpage2delete").html("'.$pathFolder[$folder].'");' . PHP_EOL;
		print '						$("#delete_page").modal("show");' . PHP_EOL;
		print '				}' . PHP_EOL;
		print '			);' . PHP_EOL;
		print '			$("#cfg-'.$folder.'").click(' . PHP_EOL;
		print '				function(){' . PHP_EOL;
		print '						$("#cfgpage").html("'.$folder.'");' . PHP_EOL;
		print '						$("#cfgpagefolder").html("'.$pathFolder[$folder].'");' . PHP_EOL;
		print '						$("#cfg_page").modal("show");' . PHP_EOL;
		print '				}' . PHP_EOL;
		print '			);' . PHP_EOL;
}
print '		}' . PHP_EOL;
print ');' . PHP_EOL;
print '</script>' . PHP_EOL;
?>
<div id="new_folder" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Nuova Cartella in </h4>
				<div id="folder-name"></div>
				<div id="path-folder"></div>
            </div>
            <div class="modal-body text-center">

				<form class="form_new_folder" role="form">
					<div class="form-group">
						<label for="foldername"><span class="glyphicon"></span> Inserisci il nome della cartella </label>
						<input type="text" class="form-control" id="foldername" name="foldername" placeholder="nome cartella" value="">
					</div>
						<button type="submit" class="btn btn-success"><span class="glyphicon" ></span> CREA CARTELLA </button>
                        <a href="?p=resources" class="btn btn-info"> Ritorna </a>
						<div id="result"></div>
				</form>

            </div>
        </div>
    </div>
</div>
<div id="delete_folder" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Rimuovi cartella: </h4>
				<div id="folder2delete"></div>
				<div id="pathfolder2delete"></div>
            </div>
            <div class="modal-body text-center">

				<form class="form_delete_folder" role="form">
						<button type="submit" class="btn btn-success"><span class="glyphicon" ></span> Procedi </button>
                        <a href="?p=resources" class="btn btn-info"> Ritorna </a>
						<div id="result2"></div>
				</form>

            </div>
        </div>
    </div>
</div>
<div id="add_page" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Nuova Pagina in:</h4>
				<div id="folder-page-name"></div>
				<div id="path-page"></div>
            </div>
            <div class="modal-body text-center">

				<form class="form_new_page" role="form">
						<button type="submit" class="btn btn-success"><span class="glyphicon" ></span> CREA PAGINA </button>
                        <a href="?p=resources" class="btn btn-info"> Ritorna </a>
						<div id="result3"></div>
				</form>

            </div>
        </div>
    </div>
</div>
<div id="delete_page" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Rimuovi pagina: </h4>
				<div id="folderpage2delete"></div>
				<div id="pathfolderpage2delete"></div>
            </div>
            <div class="modal-body text-center">

				<form class="form_delete_page" role="form">
						<button type="submit" class="btn btn-success"><span class="glyphicon" ></span> Procedi </button>
                        <a href="?p=resources" class="btn btn-info"> Ritorna </a>
						<div id="result4"></div>
				</form>

            </div>
        </div>
    </div>
</div>
<div id="cfg_page" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Attributi pagina: </h4>
				<div id="cfgpage"></div>
				<div id="cfgpagefolder"></div>
            </div>
            <div class="modal-body text-center">

				<form class="form_cfg_page" role="form">
					<div class="form-group">
						<label for="pagetitle"><span class="glyphicon"></span> TODO: Theme, Date/Time, Author, Tags, Categories, Meta, Visibility. </label>
					</div>
						<button type="submit" class="btn btn-success"><span class="glyphicon" ></span> Salva </button>
                        <a href="?p=resources" class="btn btn-info"> Ritorna </a>
						<div id="result5"></div>
				</form>

            </div>
        </div>
    </div>
</div>
