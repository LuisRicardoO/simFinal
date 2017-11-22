<?php
/**
 * Created by PhpStorm.
 * User: fbdia
 * Date: 22/11/2017
 * Time: 17:33
 */

if (isset($_POST['user']) && isset($_POST['email']) && isset($_POST['pass'])) {
    //verify if the user already exists-username
    $link = mysqli_connect('localhost', 'root', '', 'SIM2') or die('Error connecting to the server: ' . mysqli_error($link));
    $check = 'SELECT * from USER where USERNAME="' . $_POST['user'] . '"';
    $check_result = mysqli_query($link, $check) or die ('The query failed: ' . mysqli_error($link));
    $check_number = mysqli_num_rows($check_result); //if it returns 1 it is a valid user

    if ($check_number == 1) {
        $todo = "failUser";
    } else {
        //verify if the user already exists- email
        $check = 'SELECT * from CLIENT where EMAIL="' . $_POST['email'] . '"';
        $check_result = mysqli_query($link, $check) or die ('The query failed: ' . mysqli_error($link));
        $check_number = mysqli_num_rows($check_result); //if it returns 1 it is a valid user


        if ($check_number == 1) {
            $todo = "failEmail";
        } else {
            //insert user
            $passmd5 = md5($_POST['pass'], false);
            $queryDailyActivity = 'SELECT ID from DAILYACTIVITY where DESCRIPTION="' . $_POST['activityLevel'] . '"';
            $result = mysqli_query($link, $queryDailyActivity) or die('The query failed: ' . mysqli_error($link));
            $row = mysqli_fetch_array($result);

            $idActivityLevel = $row['ID'];


            $insertClient = 'INSERT INTO CLIENT (NAME,EMAIL,ADDRESS,CONTACT,GENDER,BIRTHDATE,WEIGHT,HEIGHT,PHOTO,ID_DAILYACTIVITY) values ("' . $_POST['name'] . '","' . $_POST['email'] . '","' . $_POST['address'] . '","' . $_POST['contact'] . '",' . $_POST['gender'] . ',' . "CURRENT_DATE" . ',' . $_POST['weight'] . ',' . $_POST['height'] . ',1,' . $idActivityLevel . ')';
            $result = mysqli_query($link, $insertClient) or die ('The query failed: ' . mysqli_error($link));

            $queryClientID = 'SELECT ID FROM CLIENT WHERE EMAIL="' . $_POST['email'] . '"';
            $result = mysqli_query($link, $queryClientID) or die('The query failed: ' . mysqli_error($link));
            $row = mysqli_fetch_array($result);

            $idClient = $row['ID'];
            echo $idClient;

            $insertUser = 'INSERT INTO USER (USERNAME,PASS,TYPE,ID_USER,ISACTIVE) VALUES ("' . $_POST['user'] . '","' . $passmd5 . '",2,' . $idClient . ',TRUE)';
            $result = mysqli_query($link, $insertUser) or die ('The query failed: ' . mysqli_error($link));

            $todo = "userSucces";
        }

    }
    //ola
}
?>