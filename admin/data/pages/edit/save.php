<?php
$cmspath = "../../../../";
include($cmspath . 'config.php');
include($cmspath . 'common/common.inc.php');
$resultFunction = False;
$_page = $_POST['pagename'];
$_path = $dataSitesPath . $siteNamePath . 'paths/' . $_page . '.path.php';
include($cmspath . $_path);
$_pagePath = $dataPagesPath . $pagePath;
$_title = $_POST['titlepage'];
$page2update = $_POST['textpage'];
$whereConfig = $cmspath . $_pagePath . "config.php";
$wherePage = $cmspath . $_pagePath . "page.php";
$c = '<?php' . PHP_EOL;
$c = $c . '$title = "'.$_title.'";' . PHP_EOL;
$c = $c . '?>' . PHP_EOL;
if (file_exists($whereConfig)) {
    if (is_writable($whereConfig)) {
        $nc = file_put_contents($whereConfig,$c);
        $resultFunction = True;
    }
    else {
        $resultFunction = False;
    }
}
else {
    $resultFunction = False;
}
if (file_exists($wherePage)) {
    if (is_writable($wherePage)) {
        $nc = file_put_contents($wherePage,$page2update);
        $resultFunction = True;
    }
    else {
        $resultFunction = False;
    }
}
else {
    $resultFunction = False;
}
if ($resultFunction) {
    print '{"result":' . '"OK",' . '"page":"' . $_page . '","where":"' . $wherePage . '"}';
}
else {
    print '{"result":' . '"KO",' . '"page":"' . $_page . '","where":"' . $wherePage . '"}';
}
?>
