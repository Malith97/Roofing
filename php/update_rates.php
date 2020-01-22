<?php

require 'dbconnect.php';
if(isset($_POST['submit1']))
{
    $supID = $_POST['supID'];
    $rate = $_POST['rate'];


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
        //UPDATE `users` SET `kg`=[value-8],`km`=[value-9],`ufast`=[value-10],`fast`=[value-11],`reg`=[value-12],`slow`=[value-13] WHERE `id`=[value-1]
        $sql = "UPDATE `users` SET `km`=$rate WHERE `id`=$supID;";
        //echo $sql;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo '<script language="javascript">
					window.location.href = "../sup_view_routes.php"
					window.alert("New Rates Updated!")
					</script>';
					exit();
    }
}

if(isset($_POST['submit2']))
{
    $supID = $_POST['supID'];
    $rate = $_POST['rate'];


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
        //UPDATE `users` SET `kg`=[value-8],`km`=[value-9],`ufast`=[value-10],`fast`=[value-11],`reg`=[value-12],`slow`=[value-13] WHERE `id`=[value-1]
        $sql = "UPDATE `users` SET `kg`=$rate WHERE `id`=$supID;";
        //echo $sql;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo '<script language="javascript">
					window.location.href = "../sup_view_routes.php"
					window.alert("New Rates Updated!")
					</script>';
					exit();
    }
}

if(isset($_POST['submit3']))
{
    $supID = $_POST['supID'];
    $ufast = $_POST['ufast'];
    $fast = $_POST['fast'];
    $reg = $_POST['reg'];
    $slow = $_POST['slow'];


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
        //UPDATE `users` SET `kg`=[value-8],`km`=[value-9],`ufast`=[value-10],`fast`=[value-11],`reg`=[value-12],`slow`=[value-13] WHERE `id`=[value-1]
        $sql = "UPDATE `users` SET `ufast`=$ufast,`fast`=$ufast,`reg`=$reg,`slow`=$slow WHERE `id`=$supID;";
        //echo $sql;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo '<script language="javascript">
					window.location.href = "../sup_view_routes.php"
					window.alert("New Rates Updated!")
					</script>';
					exit();
    }
}

?>