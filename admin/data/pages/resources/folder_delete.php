<?php
$_path = $_POST['pathfolder'];
$where = '../../../../' . $_path . '/';
if ($files = glob($where . "*")) {
    // ci sono file
    print '[DIR: ' . $where . "] - Attenzione la Cartella NON è vuota! ";
} else {
    // NON ci sono file
    if (rmdir($where)) {
        print '[DIR: ' . $where . "] - Cartella cancellata con successo.";
    }
    else {
        print '[DIR: ' . $where . "] - ERRORE.";
    }
}
?>
