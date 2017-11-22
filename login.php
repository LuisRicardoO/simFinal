<html>




<body>
	<form method="POST" action="http://localhost/trabFinal/repo/index.php?operation=checkLogin">
		<p>Username: <input type="text" name="user" >
        <?php
           if($wrongLogin)
               echo " wrong username. Try again";
        ?>
        </p>
		<p>Password: <input type="password" name="pass" ></p>
		<p><input type="submit" name="submit" value="Submit" ></p>
	</form>	
</body>

</html>