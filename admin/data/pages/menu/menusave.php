<?php
$cmspath = "../../../../";
include($cmspath . 'config.php');
$resultFunction = False;
$menu2update = $_POST['textmenu'];
$where = $cmspath . $componentPath . 'menu.php';
if (file_exists($where)) {
    if (is_writable($where)) {
        $nc = file_put_contents($where,$menu2update);
        $resultFunction = True;
        print "OK - 000 - Operazione compiuta con successo.";
    }
    else {
        $resultFunction = False;
        print "KO - 001 - Negato Accesso in Scrittura." . $where;
    }
}
else {
    $resultFunction = False;
    print "KO - 002 - Percorso non esistente." . $where;
}
?>
