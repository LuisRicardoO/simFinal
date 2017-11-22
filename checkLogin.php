<?php
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
                if ($type == 1 || $type == 2 || $type == 3 || $type == 4) {
                    $todo = "goMenu";
                    $_SESSION['started'] = 'true';
                    $_SESSION['user'] = $_POST['user'];
                    $_SESSION['type'] = $type;
                } else {
                    $todo = "goUserNotValid";
                }
            }
        } else {
            $todo = "goWrongLogin";
        }
    } else {
        $todo = "goWrongLogin";
    }
}
?>