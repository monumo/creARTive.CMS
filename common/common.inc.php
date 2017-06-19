<?php

function getPageNoCache($page) {
    header("Expires: on, 01 Jan 1970 00:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");    
    header("Location: index.php?p=" . $page);
}

function getPagePath($index) {
    global $paramPage, $dataSitesDefaultPath, $pagePath;
    if (file_exists($index)) {
        include($index); 
        print "<br><br>TROVATA!!!<br>";
        print $pagePath;
    }
    else {
        //print "la pagina non c'è!";
        $paramPage = '404';
        $index = "system/data/paths/" . $paramPage . ".path.php";
        include($index); 
    }
}

function setPageResources() {
    global 	$dataSitesDefaultPath,$paramPage,$dataPagesPath,$page2include,$cfg2include,$index,$completePagePath,$paramCommand,$sessionAdmin;
	//
	$completePagePath = "";
	$page2include = "";
	$cfg2include = "";
	// recupero il path delle pagine amministrative 
	$pp = $paramPage;
    $cc = $paramCommand;
    //
    if (($pp == 'admin') || ($pp == 'login') || ($pp == 'permalinks') || ($pp == 'resources') || ($pp == 'settings') || ($pp == 'profile') || ($pp == 'menu') || ($pp == 'logout') || ($pp == 'edit') || ($pp == 'sidebar')) {
        $index = "admin/data/paths/" . $paramPage . ".path.php";
        include($index); 
        $completePagePath = "admin/data/pages/" . $pagePath;
    }
    else {
        if (($pp == 'main' ) || ($pp == '404') || ($pp == 'noauth')) {
            $index = "system/data/paths/" . $paramPage . ".path.php";
            include($index); 
            $completePagePath = "system/data/pages/" . $pagePath;
        }
        else {
            $index = $dataSitesDefaultPath . "paths/" . $paramPage . ".path.php";
            if (file_exists($index)) {
                include($index); 
                $completePagePath = $dataPagesPath . $pagePath;
            }
            else {
                $paramPage = '404';
                $index = "system/data/paths/" . $paramPage . ".path.php";
                include($index); 
                $completePagePath = "system/data/pages/" . $pagePath;
            }
            //print '<br><br>' . $pagePath;
            //print '<br><br>' . $completePagePath;
        }
    }

    // Command --> EDIT
    if ($paramCommand == 'edit') {
        if ($sessionAdmin == 'none') {
            $paramPage = 'login';
        }
        else {
            $paramPage = 'edit';
        }
        $index = "admin/data/paths/" . $paramPage . ".path.php";
        include($index); 
        $completePagePath = "admin/data/pages/" . $pagePath;
    }
	// restituisco i path di config e page da includere
    $page2include = $completePagePath . "page.php";
    $cfg2include = $completePagePath . "config.php";
	//
}

function getThemePath() {
    global $themepath, $adminPath, $theme, $paramCommand, $paramPage;
    if ($paramCommand == 'edit') {
        $themepath = $adminPath . 'theme/' . $theme . '/';
    }
    $pp = $paramPage;
    if (($pp == 'admin') || ($pp == 'login') || ($pp == 'permalinks') || ($pp == 'resources') || ($pp == 'settings') || ($pp == 'profile') || ($pp == 'menu') || ($pp == 'logout') || ($pp == 'edit') || ($pp == 'sidebar')) {
        $themepath = $adminPath . 'theme/' . $theme . '/';
    }
}

function getPageTemplateHeader() {
}

function debugCMS() {
	global $paramPage, $index, $completePagePath, $page2include, $cfg2include, $siteNamePath, $defaultTheme, $siteName, $mainPageName, $dataSitesPath, $paramSite, $themepath;
	print "[paramPage = " . $paramPage . "]";
	print "[index = " . $index . "]";
	print "[completePagePath = " . $completePagePath . "]";
	print "[page2include = " . $page2include . "]";
	print "[cfg2include = " . $cfg2include . "]";
    print "[siteNamePath = " . $siteNamePath . "]";
    print "[defaultTheme = " . $defaultTheme . "]";
    print "[themepath = " . $themepath . "]";
    print "[siteName = " . $siteName . "]";
    print "[mainPageName = " . $mainPageName . "]";
}

function getFile() {
	global $download, $dataFilesPath, $dataFilesPathExt;
	if (isset($download)) {
		if (($download=="mr20a_2008") || ($download=="ERTMS_MR20A_Aprile_2008.pdf")) {
			header("Location: " . $dataFilesPathExt . "ERTMS_MR20A_Aprile_2008.pdf");
		}
		if ($download == "pippo"){
			header("Location: ?p=404");
		}
	else {
		  die('Impossibile scaricare il file.');
		}
	}
}

function getSiteParam() {
    global $paramSite, $mainPageName, $siteNamePath, $defaultTheme, $siteName, $mainPageName, $dataSitesPath;
    if (isset($paramSite)) {
        include($dataSitesPath . $paramSite . "/config.php");
    }
}

function getCommand() {
}

function getLogin($request) {
    if ($request == "yes") {
        $body = '<body onload="myFunction()">';
    }
    else {
        $body = '<body>';
    }
    return $body;
}

?>
