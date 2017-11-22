<body>
Menu

<?php
echo '<p align="center">';


switch ($_SESSION['type']):
    case 4://assistent
        echo "New user ";
        echo "Activate or deactivate user ";
        break;
    case 2://clent
        echo "Register ";
        echo "View or edit profile ";
        echo "Register diet ";
        echo "register exercice ";
        break;
    case 3://nutretionist
        echo "View own pacients ";
        echo "Accept or change sistem classification ";
        echo "Add recomendation ";
        break;
    case 1;//researcher
        echo "View data ";
        break;
endswitch;

echo "</p>";
?>

</body>