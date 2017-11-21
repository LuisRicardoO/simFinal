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
				Log in
			</td>
			<td width=10% align="center" valign="center">
				Sign in
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
