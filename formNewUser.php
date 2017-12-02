<body>





<?php
if (isset($_SESSION['started']) && $_SESSION['started'] && $_SESSION['type'] == 4) {
    echo '<div class="sect sectAssis">';
    echo '<div class="container containerAssisNewUser">';

    echo '<form method = "POST" action = "./indexV2.php?operation=checkNewUser" >';
    echo '<p > Username:<input type = "text" name = "usernameNewUser" ></p >';
    if (isset($fieldAlreadyTakenNewUser))
        if ($fieldAlreadyTakenNewUser == 1)
            echo " Username already taken";

    echo '<p > Name:<input type = "text" name = "nameNewUser" ></p >';
    echo '<p > Password:<input type = "password" name = "passwordNewUser" ></p >';
    echo '<p > E - mail:<input type = "text" name = "emailNewUser" ></p >';

    if (isset($fieldAlreadyTakenNewUser))
        if ($fieldAlreadyTakenNewUser == 2)
            echo " Email already taken";

    echo '<p><input type="radio" name="clientNewUser">Client</p>';
    echo '<p><input type="radio" name="assistantNewUser">Assistant</p>';
    echo '<p><input type="radio" name="reseacherNewUser">Researcher</p>';
    echo '<p><input type="radio" name="nutritionistNewUser">Nutritionist</p>';
    echo '<p><input type="submit" name="Submit" value="submitNewUser"></p>';

    if (isset($fieldAlreadyTakenNewUser))
        if ($fieldAlreadyTakenNewUser==0)
            echo " New user added";

    echo '</form>';
    echo '</div>';
    echo '</div>';

}
?>
</body>