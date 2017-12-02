
<html>

<head>
<title>List Clients</title>
</head>

<body>
<?php
	$link = mysqli_connect('localhost', 'root', '','sim2')
		or die('Error connecting to the server: ' . mysqli_error($link));
	$sql = 'SELECT * from user';
	$result = mysqli_query ($link ,$sql) or die('The query failed: ' . mysqli_error($link));
	$numbElements=mysqli_num_rows($result);
	
	
	
	
	if(isset($_GET['pageNumber'])&&(isset($_GET['pageSize']))){
		
		$decimal=false;		//if number of tables are decimal	
		$fullSizedTables=0; //number of fullsized tables
		
		$numbTablesAux=(float)($numbElements/$_GET['pageSize']);

		$fullSizedTables=(int)$numbTablesAux;
		
		if(($numbTablesAux-(int)$numbTablesAux)>0){					
			$decimal=true;
		}
		
	
	
		//start table
		echo	'<table style="width:100%" border=1>';
	  	echo 		'<tr>';
		echo    		'<th>id</th>';
		echo    		'<th>Name</th> ';
		echo			'<th>Date</th>';
	  	echo		'</tr>';

		//understanding how many elements to show on the table		
		$loopTimes=0;
		if($decimal && $_GET['pageNumber']>$fullSizedTables){
			$loopTimes=$numbElements-($_GET['pageSize']*$fullSizedTables);
		}else{
			$loopTimes=$_GET['pageSize'];
		}
		

		//print lines on table
			
		$name=0;
		for( $i = 1; $i<=$loopTimes; $i++ ) {
		
			$id=($_GET['pageNumber']-1)*$_GET['pageSize']+$i;		
			$sql ='select id, name, gender from client where id='."$id";			
			$result = mysqli_query ($link ,$sql) or die('The query failed: ' . mysqli_error($link));	
			$row = mysqli_fetch_array($result);
			$id = $row['id'];		
			$name=$row['name'];				
			$gender=$row['gender'];
						
			echo 		'<tr>';
			echo    		'<td>'."$id".'</td>';
			echo    		'<td>'."$name".'</td> ';
			echo			'<td>'."$gender".'</td>';
		  	echo		'</tr>';
        }	    		          		  	  		  	
	  	echo	'</table>';	
	  	//endtable

		//hyperlinksstart	
		/*
	 	echo '<p>';
	 	$i=0;
	  	for( $i = 1; $i<=$fullSizedTables; $i++ ){	  	
	  		  		
	  		echo '<a href="http://localhost/trabFinal/repo/index.php?operation=list&';
	  		
	  		echo 'pageNumber='."$i";
	  			  			  		
	  		echo '&pageSize='.$_GET['pageSize'];
			echo '">';

			$from=$_GET['pageSize']*($i-1)+1;					
			$to=$i*$_GET['pageSize'];
			echo "$from".'-'."$to";			
									
			echo '</a>';
			echo ' ';
		}				
			
		//specialcase of a decimal numeber
		if($decimal){			
			echo '<a href="http://localhost/SIM/index.php?operation=list&';
	  		
	  		echo 'pageNumber='."$i";
	  			  			  		
	  		echo '&pageSize='.$_GET['pageSize'];
			echo '">';

			$from=$_GET['pageSize']*($i-1)+1;					
			$to=$numbElements;
			echo "$from".'-'."$to";			
									
			echo '</a>';
			echo ' ';
		} 			
		echo '</p>';	
		*/
		//endhyperlinks

	}
?>


</body>

</html>
