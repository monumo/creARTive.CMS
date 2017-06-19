<?php
/****************************************************
*
* @File:      index.php
* @Package:   creARTive.CMS
* @Action:    Index File
*
*****************************************************/
include('config.php');
include($commonPath . 'common.inc.php');
//include($componentPath . 'menu.php');
//include($componentPath . 'sidebar.php');
//
//include('error.php');
//
$paramPage = $_GET['p'];
$paramSite = $_GET['s'];
$paramEdit = $_GET['e'];
$paramCommand = $_GET['c'];
$paramDownload = $_GET['d'];
$paramPageNoCache = $_GET['v'];
if (isset($paramPageNoCache)) {
    getPageNoCache($paramPageNoCache);
}
//
getFile();
//
$page2Edit = $paramPage; 
//	
if (!isset($paramPage)): $paramPage = $mainPageName; endif;
//
setPageResources();
//
if (!file_exists($page2include)) {
    $paramPage ='404';
    setPageResources();
}
include($cfg2include);
//
$themepath = 'theme/' . $theme . '/';
getThemePath();
//
if ($ifTemplate == "yes") {
  include($themepath . $template);
}
else {
  //
  include($themepath . 'heading.php');
}
//
?>
