<?php
/****************************************************
*
* @File:      config.php
* @Package:   creARTive.CMS
* @Action:
*
*****************************************************/
//
//
// ================ :: Cartelle di base :: =================================
$systemPath = "system/";
$commonPath = "common/";
$dataPath = "data/";
$themePath = "theme/";
$adminPath = "admin/";
$sessionAdmin = "yes";
$sitesPath = "";
// ================ :: Struttura dati delle pagine :: ======================
$dataSitesPath = "data/sites/";
$dataPagesPath = "data/pages/";
$dataFilesPath = "data/files/";
// ================ :: Path Base per i file esterni al sito :: =============
$dataFilesPathExt = "";
// ================================= :: SITO :: ============================
include('site.php');
$componentPath = $dataPath . 'components/sites/' . $siteNamePath;
// =========================================================================
// ================================= IMPOSTAZIONI ==========================
$defaultTheme = "bootstrap3"; // Tema base di tutto il sito
$bs = "flatly"; // solo per bootstrap 3
$siteName = "<span>Cre</span>ART<span>ive.CMS</span>"; // nome del sito
$mainPageName = "main"; // si può cambiare (dafault: main)
// =========================================================================
// =========================================================================
$dataSitesDefaultPath = $dataSitesPath . $siteNamePath; // path !!
//$systemDataPages = $sitesPath . $siteNamePath . "data/pages/"; // pagine
//$systemDataPath = $sitesPath . $siteNamePath . "data/paths/";
//$systemDataTemplate = $sitesPath . $siteNamePath . "data/template/";
// =========================================================================
$theme = $defaultTheme; //
$pagePath = "";
$downloadsPagePath = $systemDataPages . 'downloads/';
$sections2include = "";
$blocks2include = "";
$ifTitle = "yes"; // per le pagine senza titolo impostare a "no" 
$index = "";
$completePagePath = "";
// =========================================================================
?>
