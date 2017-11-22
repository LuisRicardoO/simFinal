<body>
<form method="POST" action="./index.php?operation=assistant&operationMenu=checkLogin">
    <p>Username:<input type="text" name="username" ></p>
    <p>Password:<input type="password" name="password" ></p>
    <p><input type="radio" name="profile" value="client">Client</p>
    <p><input type="radio" name="profile" value="assistant">Assistant</p>
    <p><input type="radio" name="profile" value="reseacher">Researcher</p>
    <p><input type="radio" name="profile" value="nutritionist">Nutritionist</p>
    <p><input type="submit" name="Submit" value="submit" ></p>
</form>
</body>