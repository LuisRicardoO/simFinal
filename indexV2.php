<html>

<head>

    <?php

    session_start();
    include "functions.php";

    ?>

    <title>NutriNatura</title>
    <!-- fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"/>
</head>

<?php
$link = mysqli_connect('localhost', 'root', '', 'SIM2') or die('Error connecting to the server: ' . mysqli_error($link));
?>

<?php
//pre processamento
if (isset($_GET['operation'])) {
    switch ($_GET['operation']):
        case "checkLogin":
            include "checkLogin.php";
            if (!$checkLoginDone)
                $_GET['operation'] = "login";
            break;
        case "logOut":
            session_unset();
            session_destroy();
            break;
        case "checkNewUser":
            include "checkNewUser.php";
            if (!$checkNewUserDone)
                $_GET['operation'] = "formNewUser";
            break;
        case "ADuser":
            if (isset($_GET['pageNumber']))
                $_SESSION['pageNumb'] = $_GET['pageNumber'];
            if(isset($_GET['id']))
                include "toggleUserActive.php";
            break;

    endswitch;
}
?>


<nav>
    <a href="indexV2.php?operation=home">Home</a>


    <?php
    if (isset($_SESSION['started']) && ($_SESSION['started'] == true)) {
        echo '<a href ="indexV2.php?operation=menuType">Menu</a >';
        echo '<a href ="indexV2.php?operation=logOut">Sign Out</a >';
    } else {
        echo '<a href ="indexV2.php?operation=login">Sign in</a >';
        echo '<a href="#aboutUs">About us</a>';
        echo '<a href="#contact">Contact</a>';
    }
    ?>
</nav>

<body>
<?php
//visual body
if (isset($_GET['operation'])) {
    switch ($_GET['operation']):
        case "login";
            if (isset($checkLoginDone) && !$checkLoginDone)
                $wrongLogin = true;
            include "login.php";
            break;
        case "checkLogin":
            if (!$checkLoginDone)
                break;
        case "menuType":
            include "menuType.php";
            break;
        case "formNewUser":
            include "formNewUser.php";
            break;
        case "ADuser";
            include "ADuser.php";
            break;
        default:
            include "home.php";
            break;
    endswitch;
} else {
    include "home.php";
}
?>

</body>
</html>