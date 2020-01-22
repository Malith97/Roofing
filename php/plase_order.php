<?php
session_start();

require 'dbconnect.php';


date_default_timezone_set("Asia/Colombo");
$time = date("h:i:sa");
$date = date("Y.m.d");



if(!empty($_POST['name']) && !empty($_POST['contact']) && !empty($_POST['address']))
{
    $total_weight = $_POST["weighthdd"];
    $name = $_POST["name"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];
    $city = $_POST["distance"];
    $delevery = $_POST["agency"];
    $no_of_items = count($_SESSION["cart_item"]);
    $order_state = "pending";
    $sub_tot =  $_POST["subpricehdd"];
    $pr_dis = $_POST["disprhdd"];
    $pr_wei = $_POST["weiprhdd"];
    $total = $_POST["totalpricehdd"];


    $db = new DbConnect;
    if(!$conn = $db->connect())  
    {
        echo'<script language="javascript">
                window.alert("SQL ERROR. Please check the SQL code ")
                </script>';
                //exit();
    }
    else
    {

        $sql = "INSERT INTO `main_order`(`sup_id`, `order_items`, `order_weight`, `order_status`, `customer_contact`, `customer_name`, `customer_address`, `distance`, `sub_price`, `dis_price`, `wei_price`, `total`) 
        VALUES (" . $delevery . "," . $no_of_items . "," . $total_weight . ",\"" . $order_state . "\",". $contact . ",\"" . $name . "\",\"" . $address . "\"," . $city . "," . $sub_tot . "," . $pr_dis . "," . $pr_wei . "," . $total . ");";
        //echo $sql;
        if($conn->exec($sql)){
            $last_id = $conn->lastInsertId();
            //echo $last_id;
            $sql2 ="";
            foreach ($_SESSION["cart_item"] as $item) {
                $sql2 .= "INSERT INTO `sub_order`(`order_id`, `product_name`, `quantity`) VALUES (" . $last_id . ",\"" . $item["product_name"] . "\"," . $item["quantity"] . "); ";  
            }
            if($conn->exec($sql2)){
                unset($_SESSION["cart_item"]);
                echo'<script language="javascript">
                        window.alert("Order Placed Successfully !")
                        window.location.href = "../index.php"
                        </script>';
                        exit();
            }else{
                echo'<script language="javascript">
                        window.alert("Second update fail. Please check the SQL code ")
                        </script>';
                        //exit();
            }
        }else{
            echo'<script language="javascript">
                    window.alert("first update fail. Please check the SQL code ")
                    </script>';
                    //exit();
        }


        //echo '<script language="javascript">
					//window.location.href = "../index.php    "
					//window.alert("Prder Complete!")
					//</script>';
					//exit();
    }
}





?>