<?php
	
	if(isset($_POST['log-in']))
	{
		require 'dbconnect.php';
		session_start();
		$username = $_POST['uname'];
		$password = $_POST['pword'];

		if(empty($username) || empty($password))
		{
			echo'<script language="javascript">
						window.alert("Please fill the empty fields")
						window.location.href = "../login.html"
						</script>';
						exit();
		}
		else{
			$sql = "SELECT * FROM users WHERE com_email=\"" . $username . "\"";

			$db = new DbConnect;

			if(!$conn = $db->connect())
				
			{
				echo'<script language="javascript">
						window.alert("SQL ERROR. Please check the SQL code ")
						window.location.href = "../login.html"
						</script>';
						exit();
			}
			else
			{
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				
				if($result = $stmt->fetchAll(PDO::FETCH_ASSOC))
				{
					//$pwdcheck = password_verify($password, $row['fname']);
					$passveri;
					$UID;
					$Sts;
					foreach ($result as $rows) {
                                                 $passveri = $rows['com_password'];
												 $UID = $rows['id'];
                                                 $Sts = $rows['type'];
                                                }
					$pwdcheck = false;
					if ($password == $passveri){
						$pwdcheck = true;
					}
					if($pwdcheck == false)
					{
						echo'<script language="javascript">
						window.alert("You entered a Wrong Password !")
						window.location.href = "../login.html"
						</script>';
						exit();
						
					}else if($pwdcheck == true)
					{
						
						switch ($Sts) {
							case '1':
								echo '<script language="javascript">
								window.location.href = "../sell_orders.php"
								</script>';
								exit();
								break;

							case '2':
								$_SESSION["get_datasup"] = 0;
								$_SESSION["idsup"] = $UID;
								echo '<script language="javascript">
								window.location.href = "../sup_orders.php"
								</script>';
								exit();
								break;

							default:
								echo'<script language="javascript">
								window.alert("Error")
								window.location.href = "../login.html"
								</script>';
								exit();
								break;
						}
				
					}else
					{
						echo'<script language="javascript">
						window.alert("You entered a Wrong Password !")
						window.location.href = "../login.html"
						</script>';
						exit();
						
						
						
					}
				}else
				{
					echo'<script language="javascript">
						window.alert("Username incorrect! Please check the username and try again..")
						window.location.href = "../login.html"
						</script>';
						exit();
				}
			}
		}



	}	
	else
	{
		echo'<script language="javascript">
		window.alert("Wrong connection")
		window.location.href = "../login.html"
		</script>';
		exit();

	}


	
?>