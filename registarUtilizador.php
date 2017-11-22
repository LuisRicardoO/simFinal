<html>

<head>
<style>
	input[type=submit] {
    width: 80%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    
</style>
</head>

<body>
	<div>
        <?php
            if (isset($_POST['changeData'])){
                if ($_POST['changeData']=='true'){
                    echo "<form method=\"POST\" action=\"http://localhost/SIM/trab2.php?operation=updateClient\">";
                    echo "<p align=\"center\"><b>Atualizar Dados</b></p>";

                }
                else{
                    echo "<form method=\"POST\" action=\"http://localhost/SIM/trab2.php?operation=addUser\">";
                    echo "<p align=\"center\"><b>Registar novo paciente</b></p>";
                }

            }
//ola
        ?>



		<br>
		
		<p>Nome: <input type="text" name="name" placeholder="Nome completo" ></p>
		
		<p>Data de nascimento(dd-mm-aaaa): <input type="text" name="birthDate" placeholder="dd-mm-aa" ></p>
		
		<p> Genero </p>
		<p><input type="radio" name="gender" value=TRUE>Masculino</p>
		<p><input type="radio" name="gender" value=FALSE>Feminino</p>
		
		<p>Peso(Kg):<input type="text" name="weight" placeholder="Peso"> </p>
		
		<p>Altura(m):<input type="text" name="height" placeholder="Altura"> </p>
		
		<p>Nivel Atividade Diaria</p>
		
		<p><input type="radio" name="activityLevel"	value="sedentary">Sedenetario</p>
		
		<p><input type="radio" name="activityLevel"	value="lowActive">Pouco Ativo</p>
		
		<p><input type="radio" name="activityLevel" value="active">Ativo</p>
		
		<p><input type="radio" name="activityLevel" value="veryActive">Muito Ativo</p>

		<p>E-mail:<input type="text" name="email" placeholder="email"> </p>
		
		<p>Contacto:<input type="text" name="contact" placeholder="Contacto telefonico" > </p>
				
		<p>Morada:<input type="text" name="address" placeholder="Morada"> </p>
		
		<p>Utilizador: <input type="text" name="user" placeholder="Username que ira usar para fazer log in" ></p>
		
		<p>Password: <input type="password" name="pass" placeholder="Passwor que ira usar para fazer log in"></p>
		
		<input type="submit" name="Submit" value="Submeter" >
	</form>
	
	</div>
	

</body>

</html>
