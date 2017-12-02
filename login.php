<html>
<body>
<div class="spacer"></div>
<div class="sect sectLogin">
    <div class="container containerLogin">
        <form method="POST" action="./indexV2.php?operation=checkLogin">
            <p>Username: <input type="text" name="user">
                <?php
                if (isset($wrongLogin) && $wrongLogin)
                    echo " unknown user";
                ?>
            </p>
            <p>Password: <input type="password" name="pass"></p>
            <p><input type="submit" name="submit" value="Submit"></p>
        </form>
    </div>
</div>
</body>
</html>