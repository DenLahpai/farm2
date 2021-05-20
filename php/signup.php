<?php
require_once "handler.php";

if (isset($_POST)) {
    
    $Link = uniqid('vdr', true);

    $db = new Database();
    //checking for duplication 
    $stm = "SELECT * FROM Vendors WHERE
        Mobile = :Mobile
    ;";
    $db->query($stm);
    $db->bind(":Mobile", trim($_POST['Mobile']));
    $row_count = $db->rowCount();

    if ($row_count >= 1) {
        //duplicate entry
        echo "There is already an account with us with the mobile number you have provided!<br>";
        echo "If you have forgotten your password, please <a href='forgot_password.htm'>click here</a>";
        echo " to reset your password.";
    }

    else {
        //inserting new entry
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
}

?>
