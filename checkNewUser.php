<?php
//this includes outputs checkNewUserValid
$checkNewUserDone=false;
$fieldAlreadyTakenNewUser=0;
$typeNewUser=-1;
/*
 * fieldAlreadyTakenNewUser=0=>good to go
 * fieldAlreadyTakenNewUser=1=>username already taken
 * fieldAlreadyTakenNewUser=2=>email already taken
 *
 */
if (isset($_SESSION['started']) && $_SESSION['started'] && $_SESSION['type'] == 4) {
    if (isset($_POST['usernameNewUser']) && isset($_POST['passwordNewUser']) && isset($_POST['emailNewUser']) && isset($_POST['Submit']) && isset($_POST['nameNewUser']) && (isset($_POST['clientNewUser']) || isset($_POST['assistantNewUser']) || isset($_POST['reseacherNewUser']) || isset($_POST['nutritionistNewUser']))) {
//check if username or password or email already exists
        //check username
        $sqlNewUser = 'SELECT username FROM USER WHERE (username = "' . $_POST['usernameNewUser'] . '")';
        $resultNewUser = mysqli_query($link, $sqlNewUser) or die('The query failed: ' . mysqli_error($link));
        $numberNameNewUser = mysqli_num_rows($resultNewUser);
        //check email
        $sqlNewUser = 'SELECT email FROM USER WHERE (email = "' . $_POST['emailNewUser'] . '")';
        $resultNewUser = mysqli_query($link, $sqlNewUser) or die('The query failed: ' . mysqli_error($link));
        $numberEmailNewUser = mysqli_num_rows($resultNewUser);

        if ($numberEmailNewUser != 0)
            $fieldAlreadyTakenNewUser = 2;
        if ($numberNameNewUser != 0)
            $fieldAlreadyTakenNewUser = 1;
        if ($fieldAlreadyTakenNewUser == 0) {
            //define type and insert
            if (isset($_POST['reseacherNewUser'])) {
                $tableNewUser = "researcher";
                $typeNewUser = 1;
            }
            if (isset($_POST['clientNewUser'])) {
                $tableNewUser = "client";
                $typeNewUser = 2;
            }
            if (isset($_POST['nutritionistNewUser'])) {
                $tableNewUser = "nutritionist";
                $typeNewUser = 3;
            }
            if (isset($_POST['assistantNewUser'])) {
                $tableNewUser = "assistant";
                $typeNewUser = 4;
            }

            $sqlNewUser = 'INSERT INTO ' . $tableNewUser . '(name) VALUES ("' . $_POST['nameNewUser'] . '")';
            //echo "->".$sqlNewUser."<-";
            mysqli_query($link, $sqlNewUser) or die('The query failed: ' . mysqli_error($link));

            //get the inserted ID
            $sqlNewUser = 'SELECT id from ' . $tableNewUser . ' WHERE name="' . $_POST['nameNewUser'] . '"';
            //echo "2222->".$sqlNewUser."<-";
            $resultNewUser = mysqli_query($link, $sqlNewUser) or die('The query failed: ' . mysqli_error($link));
            $rowNewUser = mysqli_fetch_array($resultNewUser);
            $id_userNewUser = $rowNewUser['id'];
            //echo "3333->".$id_userNewUser."<-";

            //insert User
            $sqlNewUser = 'INSERT INTO user(username, email, pass, type, id_user, isActive) VALUES ("' . $_POST['usernameNewUser'] . '","' . $_POST['emailNewUser'] . '","' . $_POST['passwordNewUser'] . '",' . $typeNewUser . ',' . $id_userNewUser . ',TRUE)';
            //echo "->".$sqlNewUser."<-";
            mysqli_query($link, $sqlNewUser) or die('The query failed: ' . mysqli_error($link));

            //done
            $checkNewUserValid = true;
        }
    }
}
?>