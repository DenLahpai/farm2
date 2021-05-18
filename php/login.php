<?php
require_once "handler.php";

if (isset($_POST)) {
    $db = new Database();
    $stm = "SELECT * FROM Vendors WHERE
        BINARY Username = :Username AND
        BINARY Password = :Password
    ;";
    $db->query($stm);
    $db->bind(":Username", $_POST['Username']);
    $db->bind(":Password", $_POST['Password']);
    $r = $db->rowCount();
    $rows = $db->resultsetArray();
    if ($r == 1) {
        //setting up the data from the Vendors to Session
        foreach ($rows as $_SESSION) {
        
        }
        //Zero is returned for no error
        echo 0;
    }
}     

?>
