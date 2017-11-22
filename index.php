<html>
<head>
    <title>NutriNatura</title>
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
            if (isset($_POST['submit'])) {
                $password = ($_POST['pass']);
                $sql = 'SELECT username, pass, type  FROM USER WHERE (username = "' . $_POST['user'] . '" AND pass = "' . $password . '")';
                //echo "$sql";
                $result = mysqli_query($link, $sql)
                or die('The query failed: ' . mysqli_error($link));
                $number = mysqli_num_rows($result); //if it returns 1 it is a valid user
                if (isset($number)) {
                    if ($number == 1) {
                        $row = mysqli_fetch_array($result);
                        if (isset($row['type'])) {
                            $type = $row['type'];
                            if ($type == 1 || $type == 2 || $type == 3) {
                                $todo = "goMenu";
                                $_SESSION['started'] = 'true';
                                $_SESSION['user'] = $_POST['user'];
                                $_SESSION['type'] = $type;
                            } else {
                                $todo = "goUserNotValid";
                            }
                        }
                    }
                } else {
                    $todo = "goWrongLogin";
                }
            }

            break;
        case "logOut":
            session_unset();
            session_destroy();
            $todo = "goLogOut";
            $todoStatedSession = false;
            break;
        case "menu":
            $todo="goMenu";
            break;
        default:
            $todo = "goHome";
    endswitch;
}
?>

<body>
<table border="0" height=100% width=100% align="center" valign="center">
    <tr height=5%>
        <th width=80% align="center" valign="center" bgcolor="#add8e6">
            <a href="index.php?opoeration=home"> NutriNatura</a>
        </th>
        <td width=10% align="center" valign="center" bgcolor="#afeeee">

            <?php
            if (isset($_SESSION['started']) && ($_SESSION['started'] == true)) {
                echo '<a href = "index.php?operation=logOut"> Sign out</a >';
            } else {
                echo '<a href = "index.php?operation=login"> Sign in</a >';
            }
            ?>
        </td>
        <td width=10% align="center" valign="center" bgcolor="#5f9ea0">
            <?php
            if (isset($_SESSION['started']) && ($_SESSION['started'] == true)) {
                echo '<a href = "index.php?operation=menu"> Menu</a >';
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
                    case "goMenu":
                        if (isset($_SESSION['started']) && ($_SESSION['started'] == true) && ($_SESSION['type'] != 0)) {
                            include "funcMenu.php";
                        }else{
                            include "login.php";
                        }
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
