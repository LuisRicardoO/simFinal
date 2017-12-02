<?php
/*
 * $link: connection to dada base
 * $page number: the page to show given an limited number off elements to shor per page
 * $pageSize: the number off elements to show per page
 * $header: the name each header to show
 * $headersize: the numer off collumns
 * $sqlheader: each table atrute to show
 * %tableName: table name
 * exemplo:
 * <?php
 * $isDone = table($link, 4, 10, array('Identificador', 'O nome'), 2, array("id", "username"), "user");
 * ?>
 *
 */

function table($link, $pageNumber, $pageSize, array $header, $headerSize, array $sqlheader, $tableName)
{

    if($pageNumber<=0)
        return false;

    $sql = 'SELECT * from ' . $tableName;
    //echo $sql;
    $result = mysqli_query($link, $sql) or die('The query failed: ' . mysqli_error($link));
    $numbElements = mysqli_num_rows($result);

    $decimal = false;        //if number of tables are decimal
    $fullSizedTables = 0; //number of fullsized tables

    $numbTablesAux = (float)($numbElements / $pageSize);

    $fullSizedTables = (int)$numbTablesAux;

    if (($numbTablesAux - (int)$numbTablesAux) > 0) {
        $decimal = true;
    }

    $maxTables=0;
    if($decimal)
        $maxTables=1+$fullSizedTables;
    else
        $maxTables=$fullSizedTables;

    //echo "-------------------> ".$maxTables." <---------------------";
    if($pageNumber>$maxTables)
        return false;

    //start table
    echo '<table  id="tableADuser">';
    echo '<tr>';
    for ($j = 0; $j < $headerSize; $j++) {
        echo '<th>' . $header[$j] . '</th>';
    }
    echo '</tr>';

    //understanding how many elements to show on the table
    $loopTimes = 0;
    if ($decimal && $pageNumber > $fullSizedTables) {
        $loopTimes = $numbElements - ($pageSize * $fullSizedTables);
    } else {
        $loopTimes = $pageSize;
    }

    $sql = 'select ';
    for ($j = 0; $j < $headerSize; $j++) {
        $sql = $sql.$sqlheader[$j];

        if ($j != $headerSize - 1)
            $sql = $sql.', ';
    }
    $sql = $sql.' from '.$tableName.' where id=';

    //echo "o que vai iterar->";
    //echo $sql;
    //echo "<-o que vai iterar";

    //print lines on table
    $name = 0;
    for ($i = 1; $i <= $loopTimes; $i++) {

        $id = ($pageNumber - 1) * $pageSize + $i;

        $iteratorSql=$sql.$id;
        //echo $iteratorSql;
        $result = mysqli_query($link, $iteratorSql) or die('The query failed: ' . mysqli_error($link));
        $row = mysqli_fetch_array($result);


        echo '<tr>';
        for ($j = 0; $j < $headerSize; $j++) {
            echo '<td>' . $row["$sqlheader[$j]"] . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';

    return true;
}

function getMaxPageTable($link, $pageSize, $tableName){
    $sql = 'SELECT * from ' . $tableName;
    //echo $sql;
    $result = mysqli_query($link, $sql) or die('The query failed: ' . mysqli_error($link));
    $numbElements = mysqli_num_rows($result);

    $decimal = false;        //if number of tables are decimal
    $fullSizedTables = 0; //number of fullsized tables

    $numbTablesAux = (float)($numbElements / $pageSize);

    $fullSizedTables = (int)$numbTablesAux;

    if (($numbTablesAux - (int)$numbTablesAux) > 0) {
        $decimal = true;
    }

    $maxTables=0;
    if($decimal)
        $maxTables=1+$fullSizedTables;
    else
        $maxTables=$fullSizedTables;

    return $maxTables;
}
?>


