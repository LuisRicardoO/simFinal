<html>
<?php

switch ($_SESSION['type']):
    case 4://assistent

        echo '<div class="sect sectAssis">';
        echo '<div class="container containerAssis">';
        echo '<ul>';
        echo '<li>';
        echo '<a href="indexV2.php?operation=formNewUser">New User </a>';
        echo '</li>';
        echo '<li>';
        echo '<a href="indexV2.php?operation=ADuser">Activate or deactivate user </a>';
        echo '</li>';
        echo '</ul>';
        echo '</div>';
        echo '</div>';
        break;
    case 2://client
        echo '<div class="sect sectClient">';
        echo '<a href="index.php?operation=menu&operationMenu=register">Register </a>';
        echo "| View or edit profile ";
        echo "| Register diet ";
        echo "| register exercice ";
        echo '</div>';
        break;
    case 3://nutretionist
        echo '<div class="sect sectNutr">';
        echo "View own pacients ";
        echo "| Accept or change sistem classification ";
        echo "| Add recomendation ";
        echo '</div>';
        break;
    case 1;//researcher
        echo '<div class="sect sectResearcher">';
        echo "View data ";
        echo '</div>';
        break;
endswitch;
?>

</html>
