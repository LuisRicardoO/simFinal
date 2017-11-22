<body>
<table border="0" align="center" valign="top" width="100%" height="100%">
    <tr  height="30" >
        <td bgcolor="#5f9ea0">
            <?php
            echo '<p align="center">';
            switch ($_SESSION['type']):
                case 4://assistent
                    echo '<a href="index.php?operation=menu&operationMenu=newUser">New User </a>';
                    echo "| Activate or deactivate user ";
                    break;
                case 2://client
                    echo "Register ";
                    echo "| View or edit profile ";
                    echo "| Register diet ";
                    echo "| register exercice ";
                    break;
                case 3://nutretionist
                    echo "View own pacients ";
                    echo "| Accept or change sistem classification ";
                    echo "| Add recomendation ";
                    break;
                case 1;//researcher
                    echo "View data ";
                    break;
            endswitch;

            echo "</p>";
            ?>
        </td>
    </tr>
    <tr><!--Content of menu funcinality-->
        <td>
        <?php
        if (isset($todoMenu)) {
            switch ($todoMenu):
                case "welcome":
                    echo "welcome";
                    break;
                case "newUser";
                    include "newUser.php";
                    break;
                default:
                    echo "error";
            endswitch;
        }
        ?>
        </td>
    </tr>
</table>

</body>