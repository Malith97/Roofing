<?php

require 'dbconnect.php';
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $code = $_POST['code'];
    $weight = $_POST['weight'];
    $file = $_FILES['photo'];
    $photo ="";
    print_r($file);
    $filename = $_FILES['photo']['name'];
    $filetempname = $_FILES['photo']['tmp_name'];
    $filesize = $_FILES['photo']['size'];
    $fileerror = $_FILES['photo']['error'];
    $filetype = $_FILES['photo']['type'];

    $fileExt = explode('/',$filetype);
    $fileActualExt = strtolower(end($fileExt));

    $allowd = array('jpg', 'jpeg', 'png', 'pdf');

    if (true){ //in_array($fileActualExt,$allowd)
        if ($fileerror == 0 ){
            if ($filesize < 1000000){
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = 'images/products';
                move_uploaded_file($filetempname,"$fileDestination/$fileNameNew");
                $photo = "./php/images/Products/".$fileNameNew;
            } else {
                echo'<script language="javascript">
                window.alert("File is too big !")
                </script>';
                exit();
            }
        } else {
            echo'<script language="javascript">
                window.alert("Error in File !")
                </script>';
                exit();
        }
    } else {
        echo'<script language="javascript">
                window.alert("You cant uplode file of this type !")
                </script>';
                exit();
    }

    //I added this

    if(isset($_POST["insert"])){  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $query = "INSERT INTO product(pic) VALUES ('$file')";  
      if(mysqli_query($connect, $query)){  
           echo '<script>alert("Image Inserted into Database")</script>';  
      }  
    } 

    //I added this

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
        $sql = "INSERT INTO `product`(`product_name`, `product_price`, `product_dec`, `product_code`, `product_image`, `product_weight`) VALUES (\"" . $name . "\", $price,\"" . $desc . "\",\"" . $code . "\",\"" . $photo . "\", $weight);";
        //echo $sql;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo '<script language="javascript">
					window.location.href = "../sell_index.php"
					window.alert("New Item added!")
					</script>';
					exit();
    }
}

?>