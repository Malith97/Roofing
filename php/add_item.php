<?php

require 'dbconnect.php';
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $code = $_POST['code'];
    $photo = "ffff";
    $weight = $_POST['weight'];
    echo $name;

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
        $sql = "INSERT INTO `product`(`Pname`, `Price`, `Pdescription`, `code`, `pic`, `weight`) VALUES (\"" . $name . "\", $price,\"" . $desc . "\", $code,\"" . $photo . "\", $weight);";
        echo $sql;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo '<script language="javascript">
					window.location.href = "../product.html"
					window.alert("New Item added!")
					</script>';
					exit();
    }
}

?>