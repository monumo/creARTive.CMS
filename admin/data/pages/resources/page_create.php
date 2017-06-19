<?php
$cmspath = "../../../../";
include($cmspath . 'config.php');
$_path = $_POST['pathfolder'];
$_page = $_POST['folderpagename'];
$c = '<?php' . PHP_EOL;
$c = $c . '$title = "Titolo nuova pagina";' . PHP_EOL;
//$c = $c . '$theme = "bootstrap3";' . PHP_EOL;
//$c = $c . '$author = "Admin";' . PHP_EOL;
//$c = $c . '$date_time = "";' . PHP_EOL;
//$c = $c . '$menu_text = "";' . PHP_EOL;
//$c = $c . '$menu_pos = "";' . PHP_EOL;
$c = $c . '?>' . PHP_EOL;
$content_config = $c;
$c = '<?php ?>' . PHP_EOL;
$c .= '<p> Contenuto della pagina. </p>' . PHP_EOL;
$c .= ' ' . PHP_EOL;
$content_page = $c;
$where = '../../../../' . $_path . '/';
$filename = $cmspath . $_path . '/config.php';
if (is_writable($where)) {
    $nc1 = file_put_contents($filename,$content_config);
}
else {
    print "[" . $_path . "] Path non scrivibile !";
    return;
}
if ($nc1 === false)  {
    print "[" . $filename . "] [NC1=" . $nc1 . "] Problema con config.php !";
}
else {
    $filename = $cmspath . $_path . '/page.php';
    $nc2 = file_put_contents($filename,$content_page);
    if ($nc2 == false) {
        print "[" . $filename . "] [NC2=" . $nc2 . "] Problema con page.php !";
    }
    else {
        $content = str_replace('data/pages/',"",$_path);
        $content = '<?php $pagePath = "' . $content . '/"; ?>';
        $filename = $cmspath . $dataSitesPath . $siteNamePath . 'paths/' . $_page . '.path.php';
        $nc3 = file_put_contents($filename,$content);
        if ($nc3 == false) {
            print "[" . $filename . "] [NC3=" . $nc3 . "] Problema con <file>.path.php !";
        }
        else {
            print "[PATH=" .$_path . "] " . "[PAGE=" .$_page. "] Operazione compiuta con successo !";        
        }
    }
}
?>
