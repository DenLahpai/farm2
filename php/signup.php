<?php
require_once "handler.php";

if (isset($_POST)) {
    
    $Link = uniqid('vdr', true);

    $db = new Database();
    $stm = "INSERT INTO Vendors SET 
        Link = :Link, 
        Mobile = :Mobile, 
        Password = :Password,
        Title = :Title,
        Name = :Name, 
        Address = :Address, 
        Town = :Town, 
        Dob = :Dob,
        Level = :Level, 
        Remark = :Remark 
    ;";

    $db->query($stm);
    $db->bind(":Link", $Link);
    $db->bind(":Mobile", trim($_POST['Mobile']));
    $db->bind(":Password", md5($_POST['password2']));
    $db->bind(":Title", $_POST['Title']);
    $db->bind(":Name", trim($_POST['Name']));
    $db->bind(":Address", trim($_POST['Address']));
    $db->bind(":Town", trim($_POST['Town']));
    $db->bind(":Dob", $_POST['Dob']);
    $db->bind(":Level", 1);
    $db->bind(":Remark", 'New Ac');
    
    if ($db->execute()) {
        //zero is returned for no error!
        echo 0;
    }
    else {
        //One is returned for connection error!
        echo 1;
    }
}

?>
