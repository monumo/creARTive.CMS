<?php
$_folder = $_POST['foldername'];
$_path = $_POST['pathfolder'];
$where = '../../../../' . $_path . '/' . $_folder;
if (mkdir($where,0755)) {
    print '[DIR: ' . $where . "] - create with success";
}
else {
    print '[DIR: ' . $where . "] - !error mkdir!";
}
?>
