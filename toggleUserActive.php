<?php

if (isset($_SESSION['started']) && $_SESSION['started'] && $_SESSION['type'] == 4 && isset($link) && isset($_GET['id'])) {

    //get current active or inactive user
    $sql = 'SELECT isActive FROM user WHERE id=' . $_GET['id'];
    //echo $sql;
    $result = mysqli_query($link, $sql) or die('The query failed: ' . mysqli_error($link));
    $row = mysqli_fetch_array($result);

    if ($row['isActive'] == 1)
        $activate = 0;

    if ($row['isActive'] == 0)
        $activate = 1;
    //row undifined
    if (!isset($activate))
        return false;

    $sql= 'UPDATE user SET isActive='.$activate.' WHERE id='.$_GET['id'];
    //echo $sql;
    mysqli_query($link, $sql) or die('The query failed: ' . mysqli_error($link));
    return true;
}

?>
