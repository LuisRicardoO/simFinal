<html>


<style>
    #grad1 {
        height: 200px;
        background-color: #cccccc;
        background-image: linear-gradient(red, yellow);
    }
</style>

<head>
    <title>NutriNatura</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>



<!--preprocessamento-->
<?php
//start
session_start();
//connect to data base
$link = mysqli_connect('localhost', 'root', '', 'SIM2') or die('Error connecting to the server: ' . mysqli_error($link));

if (isset($_GET['operation'])) {
    switch ($_GET['operation']):
        case "home":
            $todo = "goHome";
            break;
        case "login":
            $todo = "goLogin";
            break;
        case "checkLogin":
            /*
             * $_SESSION['started'] = 'true';
             * $_SESSION['id']=$row['id'];
             * $_SESSION['user'] = $_POST['user'];
             * $_SESSION['type'] = $type;
             *
             * variable $checkLoginDone= true or false checks if sucefull
             */
            include "checkLogin.php";//checks login
            if (isset($checkLoginDone)) {
                if ($checkLoginDone) {
                    $todo = "goMenu";
                } else {
                    $todo = "goWrongLogin";
                }
            } else {
                echo "checklogin failed";
                $todo = "goHome";
            }
            break;
        case "logOut":
            session_unset();
            session_destroy();
            $todo = "goLogOut";
            $todoStatedSession = false;
            break;
        case "menuNewUser":
            if (isset($_SESSION['started']) && $_SESSION['started'] && $_SESSION['type'] == 4)
                $todo = "goMenuNewUser";
            else {
                echo "Invalid session";
            }
            break;
        case "checkNewUser":
            if (isset($_SESSION['started']) && $_SESSION['started'] && $_SESSION['type'] == 4) {
                include "checkNewUser.php";
                if (isset($checkNewUserValid)) {
                    $todo = "goMenuNewUser";
                    if ($checkNewUserValid == true) {
                        $rightFormNewUser = true;
                        $wrongFormNewUser = 0;
                    } else {
                        $wrongFormNewUser = $fieldAlreadyTakenNewUser;
                        $rightFormNewUser = false;
                    }
                }
            } else {
                echo "Invalid session";
            }
            break;
        case "menuClientRegist":
            if (isset($_SESSION['started']) && $_SESSION['started'] && $_SESSION['type'] == 2)
                $todo = "goMenuClientRegist";
            else
                echo "Invalid session";
            break;
        case "menuADUser":
            if (isset($_SESSION['started']) && $_SESSION['started'] && $_SESSION['type'] == 4)
                $todo = "goMenuADUser";
            else
                echo "Invalid session";
            break;
        default:
            $todo = "goHome";
    endswitch;
}
?>


<body>
<table border="0" height=100% width=100% align="center" valign="center">
    <tr height=5%>
        <th width=80% align="center" valign="center" bgcolor="#cbdbd7">
            <a href="index.php?opoeration=home"> NutriNatura</a>
        </th>
        <td width=10% align="center" valign="center" bgcolor="#91aab4">

            <?php
            if (isset($_SESSION['started']) && ($_SESSION['started'] == true)) {
                echo '<a href = "index.php?operation=logOut"> Sign out</a >';
            } else {
                echo '<a href = "index.php?operation=login"> Sign in</a >';
            }
            ?>
        </td>
        <td width=10% align="left" valign="center" bgcolor="#fcfff5">
            <?php
            if (isset($_SESSION['started']) && ($_SESSION['started'] == true)) {
                //echo '<a href = "index.php?operation=menu"> Menu</a >';
                echo "<ul>";
                echo "<li>Menu</li>";

                echo "<ul>";

                switch ($_SESSION['type']):
                    case 4://assistent
                        echo '<li><a href="index.php?operation=menuNewUser">New User</a></li>';
                        echo '<li><a href="index.php?operation=menuADUser">Activate or deactivate user</a></li>';
                        break;
                    case 2://client
                        echo '<li><a href="index.php?operation=menuClientRegist">Register </a></li>';
                        echo "<li>View or edit profile</li>";
                        echo "<li>Register diet</li>";
                        echo "<li>register exercice</li>";
                        break;
                    case 3://nutretionist
                        echo "<li>View own pacients</li>";
                        echo "<li>Accept or change sistem classification</li>";
                        echo "<li>Add recomendation</li>";
                        break;
                    case 1;//researcher
                        echo "<li>View data</li>";
                        break;
                endswitch;
                echo "</ul>";

                echo "</ul>";


            } else {
                echo '<a href = "index.php?operation=register"> Sign up</a >';
            }
            ?>
        </td>
    </tr>
    <!--<tr height=2.5%>
        <td colspan="3">

        </td>
    </tr>-->
    <tr>
        <td colspan="3"><!--insert here the content of site-->
            <?php
            if (isset($todo)) {
                switch ($todo):
                    case "goHome":
                        include "home.php";
                        break;
                    case "goLogin":
                        $wrongLogin = false;
                        include "login.php";
                        break;
                    case "goWrongLogin":
                        //echo "not a valid user";
                        $wrongLogin = true;
                        include "login.php";
                        break;
                    case "goLogOut":
                        echo "see you next time";
                        break;
                    case "goMenuNewUser":
                        include "formNewUser.php";
                        break;
                    case "goMenuClientRegist":
                        include "formRegistClient.php";
                        break;

                    case "goMenuADUser":
                        include "ADuser.php";
                        break;
                endswitch;
                //subcontent
            } else {
                include "home.php";
            }
            ?>
        </td>
    </tr>
</table>
</body>


</html>
