<?php
	 if (isset($_POST['up_route_rates'])) {
	 	$hostname="localhost";
	 	$uname="root";
	 	$pwd="";
	 	$dbname="roofing";

	 	$connect=mysqli_connect($hostname,$uname,$pwd,$dbname);

	 	$text1=$_POST['text1'];
	 	$text2=$_POST['text2'];
	 	$text3=$_POST['text3'];
	 	$text4=$_POST['text4'];
	 	$text5=$_POST['text5'];
	 	$text6=$_POST['text6'];
	 	$text7=$_POST['text7'];
	 	$text8=$_POST['text8'];
	 	$text9=$_POST['text9'];

	 	$query1="UPDATE `sup_routes` SET `price`='$text1' WHERE `sup_routes`.`id`='1';";
	 	$query2="UPDATE `sup_routes` SET `price`='$text2' WHERE `sup_routes`.`id`='2';";
	 	$query3="UPDATE `sup_routes` SET `price`='$text3' WHERE `sup_routes`.`id`='3';";
	 	$query4="UPDATE `sup_routes` SET `price`='$text4' WHERE `sup_routes`.`id`='4';";
	 	$query5="UPDATE `sup_routes` SET `price`='$text5' WHERE `sup_routes`.`id`='5';";
	 	$query6="UPDATE `sup_routes` SET `price`='$text6' WHERE `sup_routes`.`id`='6';";
	 	$query7="UPDATE `sup_routes` SET `price`='$text7' WHERE `sup_routes`.`id`='7';";
	 	$query8="UPDATE `sup_routes` SET `price`='$text8' WHERE `sup_routes`.`id`='8';";
	 	$query9="UPDATE `sup_routes` SET `price`='$text9' WHERE `sup_routes`.`id`='9';";


	 	$result1=mysqli_query($connect,$query1);
	 	$result2=mysqli_query($connect,$query2);
	 	$result3=mysqli_query($connect,$query3);
	 	$result4=mysqli_query($connect,$query4);
	 	$result5=mysqli_query($connect,$query5);
	 	$result6=mysqli_query($connect,$query6);
	 	$result7=mysqli_query($connect,$query7);
	 	$result8=mysqli_query($connect,$query8);
	 	$result9=mysqli_query($connect,$query9);


	 	if ($result1 | $result2 | $result3 | $result4 | $result5 | $result6 | $result7 | $result8 | $result9) {
	 		echo'<script language="javascript">
						window.alert("Price Update Completed")
						window.location.href = "../sup_routes.html"
						</script>';
						exit();
	 	}else{
	 		echo "Error Update";
	 	}

	 	mysqli_close();
	 }

?>