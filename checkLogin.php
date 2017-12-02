<?php
$checkLoginDone=false;
if (isset($_POST['submit'])) {
    $password = ($_POST['pass']);
    $sql = 'SELECT id, username, pass, type, isActive  FROM USER WHERE (username = "' . $_POST['user'] . '" AND pass = "' . $password . '")';
    //echo "$sql";
    $result = mysqli_query($link, $sql)
    or die('The query failed: ' . mysqli_error($link));

    $number = mysqli_num_rows($result);
    if(isset($number)){
        if (($number == 1)) {
            $row = mysqli_fetch_array($result);
            if($row['isActive']){
                if ($row['type'] == 1 || $row['type']== 2 || $row['type'] == 3 || $row['type'] == 4) {
                    $checkLoginDone=true;
                    $_SESSION['started'] = true;
                    $_SESSION['id']=$row['id'];
                    $_SESSION['user'] = $_POST['user'];
                    $_SESSION['type'] = $row['type'];
                    $_SESSION['pageNumb']=1;
                    $checkLoginDone=true;
                }
            }
        }
    }
}
?>