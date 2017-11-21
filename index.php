<html>
<head>
<title>NutriNatura</title>
</head>

<!--preprocessamento-->
<?php
	//start
	session_start();
	//connect to data base
	$link = mysqli_connect('localhost', 'root', '','SIM2')or die('Error connecting to the server: ' . mysqli_error($link));
	
	if(isset($_GET['operation'])){
		switch ($_GET['operation']):
			case "home":
				$todo="goHome";
				break;
			case "login":
				$todo="goLogin";
				break;
			case "checkLogin":
				if(isset($_POST['submit'])){	
						$password= ($_POST['pass']);																	
						$sql = 'SELECT username, pass, type  FROM USER WHERE (username = "'.$_POST['user'].'" AND pass = "'.$password. '")';
						//echo "$sql";
						$result = mysqli_query ($link ,$sql)
							or die('The query failed: ' . mysqli_error($link));						
						$number = mysqli_num_rows($result); //if it returns 1 it is a valid user

						echo "aqui esta o numero: ".$number;

						if(isset($number)){					
							if($number==1){
								$_SESSION['started']='true';
								$_SESSION['user']=$_POST['user'];
								$row = mysqli_fetch_array($result);							
								if(isset($row['type'])){
									$type=$row['type'];
									switch($type):
										case 1:
											$todo="goResearch";							
											break;
										case 2:
											$todo="goClient";
											break;
										case 3:
											$todo="goNutritionist";
											break;
										default:
											$todo="goUserNotvalid";
									endswitch;
								}								
							}else{
								$todo="goWrongLogin";													
							}
						}						
					}
				break;
			default:
				$todo="goHome";
		endswitch;
	}
?>

<body>
	<table border="1" height=100% width=100% align="center" valign="center">
		<tr height=5%>
			<th width=80% align="center" valign="center">
				NutriNatura
			</th>
			<td width=10% align="center" valign="center">
				<a href="http://localhost/trabFinal/repo/index.php?operation=login"> Sign in </a>
			</td>
			<td width=10% align="center" valign="center">
				Sign up
			</td>		
		</tr> 
		<tr height=2.5%>
			<td colspan="3">
			
			</td>	
		</tr>
		<tr>				
			<td colspan="3"><!--insert here the content of site-->
				<?php	
					if(isset($todo)){
						switch ($todo):
							case "goHome":
								include "home.php";
								break;
							case "goLogin":
								include "login.php";
								break;
							case "goResearch":
								echo "welcome reseacher";
								break;
							case "goClient":
								echo "welcome client";
								break;
							case "goNutritionist":
								echo "welcome nutritionist";
								break;
							case "goUserNotvalid":
								echo "user not valid has to type";
								break;		
							case "goWrongLogin":
								echo "not a valid user";
								break;					
							default:
								include "home.php";
						endswitch;						
					}else{
						include "home.php";
					}
				?>					
			</td>
		</tr> 
	</table>
</body>


</html>
