<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "roofing";

	$com_name = $_POST['com_name'];
	$com_email = $_POST['com_email'];
	$com_contact = $_POST['com_contact'];
	$com_password = $_POST['com_password'];
	$type =2;

	$target="images/.".basename($_FILES['com_logo']['name']);

	$conn = new mysqli($servername, $username, $password, $dbname);

	$com_logo = $_FILES['com_logo']['name'];

 
    $com_logo = addslashes(file_get_contents($_FILES["com_logo"]["tmp_name"]));  
    //$query = "INSERT INTO tbl_images(name) VALUES ('$file')";   

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO `users`(`com_name`, `com_email`, `com_contact`, `com_logo`, `com_password`, `type`) VALUES (\"" . $com_name . "\",\"" . $com_email . "\",\"" . $com_contact . "\",\"" . $com_logo . "\",\"" . $com_password . "\",\"" . $type . "\");";

	if(move_uploaded_file($_FILES['com_logo']['tmp_name'], $target)){
		$msg = "Image uploaded successful";
	}else{
		$msg = "Image uploaded Failed";
	}

	if ($conn->query($sql) === TRUE) {
	    echo '<script language="javascript">
					window.location.href = "../login.html"
					window.alert("Account Created")
					</script>';
					exit();
	}else{
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>