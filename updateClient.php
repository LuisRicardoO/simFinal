<?php
/**
 * Created by PhpStorm.
 * User: fbdia
 * Date: 22/11/2017
 * Time: 17:36
 */
if (isset($_POST['user']) && isset($_POST['email']) && isset($_POST['pass'])){
    $link = mysqli_connect('localhost', 'root', '', 'SIM2');
    $passmd5 = md5($_POST['pass'], false);
    $queryDailyActivity = 'SELECT ID from DAILYACTIVITY where DESCRIPTION="' . $_POST['activityLevel'] . '"';
    $result = mysqli_query($link, $queryDailyActivity) or die('The query failed: ' . mysqli_error($link));
    $row = mysqli_fetch_array($result);

    $idActivityLevel = $row['ID'];
    $updateClient='UPDATE CLIENT SET NAME="' . $_POST['name'] . '",EMAIL="' . $_POST['email'] . '",ADDRESS="' . $_POST['address'] . '",CONTACT="' . $_POST['contact'] . '",GENDER=' . $_POST['gender'] . ',BIRTHDATE=' . "CURRENT_DATE" . ',WEIGHT=' . $_POST['weight'] . ',HEIGHT=' . $_POST['height'] . ',PHOTO=1,ID_DAILYACTIVITY=' . $idActivityLevel . ' WHERE ID='.$_SESSION['userID'].'';


    $result = mysqli_query($link, $updateClient) or die ('The query failed: ' . mysqli_error($link));

    $updateUser='UPDATE USER SET USERNAME="' . $_POST['user'] . '",PASS="' . $passmd5 . '" WHERE ID_USER='.$_SESSION['userID'].'';
    $result = mysqli_query($link, $updateUser) or die ('The query failed: ' . mysqli_error($link));
//ola
}
?>