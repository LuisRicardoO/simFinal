<?php
/**
 * Created by PhpStorm.
 * User: fbdia
 * Date: 23/11/2017
 * Time: 19:42
 */
//hgfd
$link = mysqli_connect('localhost', 'root', '', 'SIM2')
or die('Error connecting to the server: ' . mysqli_error($link));
echo $_SESSION['type'];

    if(isset($_SESSION['type'])){
        echo "<table border='1'>";//start table
        if($_SESSION['type']==1){
            //researcher
            echo"estou no researcher";
            echo "<tr>";

                echo "<td>";
                    echo "Gender";
                echo "</td>";

                echo "<td>";
                    echo "Height";
                 echo "</td>";

                echo "<td>";
                    echo "Weight";
                echo "</td>";

                echo "<td>";
                    echo "Daily Activity";
                echo "</td>";

                echo "<td>";
                    echo "Physical Activity";
                echo "</td>";

            echo "</tr>";

            $sql = 'SELECT * FROM CLIENT';
            $result = mysqli_query($link, $sql) or die ('The query failed: ' . mysqli_error($link));

            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $sql = 'SELECT * FROM DAILYACTIVITY WHERE (id= ' . $row['id_dailyActivity'] .')';
                $result2 = mysqli_query($link, $sql) or die ('The query failed: ' . mysqli_error($link));
                $row2 = mysqli_fetch_array($result2);

                if($row2['description']=="sedentary"){
                    $dailyActivity="Sedentary";
                }
                else{
                    if ($row2['description']=="lowActive"){
                        $dailyActivity="Not very Active";
                    }
                    else{
                        if ($row2['description']=="active"){
                            $dailyActivity="Active";
                        }
                        else
                            if ($row2['description']=="veryActive"){
                                $dailyActivity="Very Active";
                            }
                    }
                }

                if ($row['gender']==1){
                    $genderAux="Male";
                }
                else{
                    $genderAux="Female";
                }

                echo "<tr>";

                echo "<td>";
                    echo $genderAux;
                echo "</td>";

                echo "<td>";
                    echo $row['height'];
                echo "</td>";

                echo "<td>";
                    echo $row['weight'];
                echo "</td>";

                echo "<td>";
                    echo $dailyActivity;
                echo "</td>";

                echo "<td>";
                    echo "Acabar";
                echo "</td>";

                echo "</tr>";
            }
        }
        else {
            if($_SESSION['type']==3){
                //nutri
                echo "estou no nutri";

            }
            else{
                if($_SESSION['type']==4){
                    //assistante
                    echo "estou no assistente";
                    echo "<tr>";

                    echo "<td>";
                        echo "Name";
                    echo "</td>";

                    echo "<td>";
                        echo "Email";
                    echo "</td>";

                    echo "<td>";
                        echo "Address";
                    echo "</td>";

                    echo "<td>";
                        echo "Contact";
                    echo "</td>";

                    echo "<td>";
                        echo "Gender";
                    echo "</td>";

                    echo "<td>";
                        echo "Birth Date";
                    echo "</td>";

                    echo "<td>";
                        echo "Weight";
                    echo "</td>";

                    echo "<td>";
                        echo "Height";
                    echo "</td>";

                    echo "<td>";
                        echo "Photo";
                    echo "</td>";

                    echo "<td>";
                        echo "Daily Activity";
                    echo "</td>";

                    echo "<td>";
                        echo "Physical Activity";
                    echo "</td>";

                    $sql = 'SELECT * FROM CLIENT';
                    $result = mysqli_query($link, $sql) or die ('The query failed: ' . mysqli_error($link));

                    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                        $sql = 'SELECT * FROM DAILYACTIVITY WHERE (id= ' . $row['id_dailyActivity'] .')';
                        $result2 = mysqli_query($link, $sql) or die ('The query failed: ' . mysqli_error($link));
                        $row2 = mysqli_fetch_array($result2);

                        if($row2['description']=="sedentary"){
                            $dailyActivity="Sedentary";
                        }
                        else{
                            if ($row2['description']=="lowActive"){
                                $dailyActivity="Not very Active";
                            }
                            else{
                                if ($row2['description']=="active"){
                                    $dailyActivity="Active";
                                }
                                else
                                    if ($row2['description']=="veryActive"){
                                        $dailyActivity="Very Active";
                                    }
                            }
                        }
                        /*$sql = 'SELECT * FROM USER WHERE (id_user= ' . $row['id'] .',type='.$_SESSION['type'].')';
                        $result3 = mysqli_query($link, $sql) or die ('The query failed: ' . mysqli_error($link));
                        $row3 = mysqli_fetch_array($result3);
                        */

                        if ($row['gender']==1){
                            $genderAux="Male";
                        }
                        else{
                            $genderAux="Female";
                        }
                        echo "<tr>";

                        echo "<td>";
                            echo $row['name'];
                        echo "</td>";

                        echo "<td>";
                            echo $row['email'];
                            //echo $row3['email'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['address'];
                        echo "</td>";

                        echo "<td>";
                            echo $row['contact'];
                        echo "</td>";

                        echo "<td>";
                            echo $genderAux;
                        echo "</td>";

                        echo "<td>";
                            echo $row['birthDate'];
                        echo "</td>";

                        echo "<td>";
                            echo $row['weight'];
                        echo "</td>";

                        echo "<td>";
                            echo $row['height'];
                        echo "</td>";

                        echo "<td>";
                            echo $row['photo'];
                        echo "</td>";

                        echo "<td>";
                            echo $dailyActivity;
                        echo "</td>";

                        echo "<td>";
                            echo "ACABAR";
                        echo "</td>";

                        echo "</tr>";
                    }
                }

                else{
                    if($_SESSION['type']==2){
                        //client
                        echo "estou no cliente";
                        //$link = mysqli_connect('localhost', 'root', '', 'SIM2')
                        //or die('Error connecting to the server: ' . mysqli_error($link));

                        $sql = 'SELECT * FROM CLIENT WHERE (id= ' . $_SESSION['userID'] .')';
                        $result = mysqli_query($link, $sql) or die ('The query failed: ' . mysqli_error($link));
                        $row = mysqli_fetch_array($result);

                        if ($row['gender']==1){
                            $genderAux="Male";
                        }
                        else{
                            $genderAux="Female";
                        }

                        $sql = 'SELECT * FROM DAILYACTIVITY WHERE (id= ' . $row['id_dailyActivity'] .')';
                        $result = mysqli_query($link, $sql) or die ('The query failed: ' . mysqli_error($link));
                        $row2 = mysqli_fetch_array($result);

                        if($row2['description']=="sedentary"){
                            $dailyActivity="Sedentary";
                        }
                        else{
                            if ($row2['description']=="lowActive"){
                                $dailyActivity="Not very Active";
                            }
                            else{
                                if ($row2['description']=="active"){
                                    $dailyActivity="Active";
                                }
                                else{
                                    if ($row2['description']=="veryActive"){
                                        $dailyActivity="Very Active";
                                    }
                                }

                            }
                        }

                        /*$sql = 'SELECT * FROM USER WHERE (id_user= ' .$_SESSion['userID'].',type='.$_SESSION['type'].')';
                        $result3 = mysqli_query($link, $sql) or die ('The query failed: ' . mysqli_error($link));
                        $row3 = mysqli_fetch_array($result3);
                        */

                        echo "<tr>";

                        echo "<td>";
                            echo "Name";
                        echo "</td>";

                        echo "<td>";
                            echo "Email";
                        echo "</td>";

                        echo "<td>";
                            echo "Address";
                        echo "</td>";

                        echo "<td>";
                            echo "Contact";
                        echo "</td>";

                        echo "<td>";
                            echo "Gender";
                        echo "</td>";

                        echo "<td>";
                            echo "Birth Date";
                        echo "</td>";

                        echo "<td>";
                            echo "Weight";
                        echo "</td>";

                        echo "<td>";
                            echo "Height";
                        echo "</td>";

                        echo "<td>";
                            echo "Photo";
                        echo "</td>";

                        echo "<td>";
                            echo "Daily Activity";
                        echo "</td>";

                        echo "<td>";
                            echo "Physical Activity";
                        echo "</td>";

                        echo "<tr>";

                        echo "<td>";
                            echo $row['name'];
                        echo "</td>";

                        echo "<td>";
                            echo $row['email'];
                            //echo $row3['email'];
                        echo "</td>";

                        echo "<td>";
                            echo $row['address'];
                        echo "</td>";

                        echo "<td>";
                            echo $row['contact'];
                        echo "</td>";

                        echo "<td>";
                            echo $genderAux;
                        echo "</td>";

                        echo "<td>";
                            echo $row['birthDate'];
                        echo "</td>";

                        echo "<td>";
                            echo $row['weight'];
                        echo "</td>";

                        echo "<td>";
                            echo $row['height'];
                        echo "</td>";

                        echo "<td>";
                            echo $row['photo'];
                        echo "</td>";

                        echo "<td>";
                            echo $dailyActivity;
                        echo "</td>";

                        echo "<td>";
                            echo "Acabar";
                        echo "</td>";

                        echo "</tr>";
                    }
                }
            }
        }
        echo "</table>";//end table


    }

?>