<?php

require 'dbconnect.php';
if(!empty($_POST['email']) && !empty($_POST['msg']))
{
    $email = $_POST['email'];
    $msg = $_POST['msg'];

    $db = new DbConnect;
    if(!$conn = $db->connect())  
    {
        echo'<script language="javascript">
                window.alert("SQL ERROR. Please check the SQL code ")
                </script>';
                exit();
    }
    else
    {
        date_default_timezone_set("Asia/Colombo");
        $time = date("h:i:sa");
        $date = date("Y.m.d");
        $sql = "INSERT INTO `messages`( `email`, `message`, `date`, `time`) VALUES (\"" . $email . "\",\"" . $msg . "\",\"" . $date . "\",\"" . $time . "\");";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo '<script language="javascript">
					window.location.href = "../contact.html"
					window.alert("Message Send!")
					</script>';
					exit();
    }
}

?>