<?php 
$cmspath = "../../../../";
include($cmspath . 'config.php');
$_path = $_POST['pathfolder'];
$_page = $_POST['folderpagename'];
$where = '../../../../' . $_path . '/';
    // eliminazione di config.php
    $filename = $cmspath . $_path . '/config.php';
    if (unlink($filename))
    {
        //print "[PATH=" .$_path . "] " . "[PAGE=" .$_page. "] Operazione compiuta con successo !";
        $filename = $cmspath . $_path . '/page.php';
        if (unlink($filename))
        {
            //print "[PATH=" .$_path . "] " . "[PAGE=" .$_page. "] Operazione compiuta con successo !";
            $filename = $cmspath . $dataSitesPath . $siteNamePath . 'paths/' . $_page . '.path.php';
            if (unlink($filename)) {
            }
            else {
                print "[" . $filename . "] Problema con <file>.path.php !";
                return;
            }
        }
        else {
            print "[" . $filename . "] Problema con page.php !";
            return;
        }
    }
    else {
        print "[" . $filename . "] Problema con config.php !";
        return;
    }
print "[PATH=" .$_path . "] " . "[PAGE=" .$_page. "] Operazione compiuta con successo !";    
?>
