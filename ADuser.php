<style>
    .buttonADuser {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 2px 100px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        position: relative;
    }

    .leftButtonADuser {

        bottom: 0;
        left: 0;
    }

    .rightButtonADuser {
        bottom: 0;
        right: 0;

    }
</style>

<?php


if (isset($_SESSION['started']) && $_SESSION['started'] && $_SESSION['type'] == 4) {

    if (!isset($_SESSION['pageNumb']))
        $_SESSION['pageNumb'] = 1;


    echo '<div class="sect sectAssis">';
    echo '<div class="spacer"></div>';

    echo '<div class="containerAssisTable" >';
    table($link, $_SESSION['pageNumb'], 5, array("Identifier", "User name", "Active"), 3, array("id", "username", "isActive"), "user");

    //buttons
    if (0 >= $_SESSION['pageNumb'] - 1) {
        echo '<div class="buttonADuser leftButtonADuser">LEFT</div>';
    } else {
        $aux = $_SESSION['pageNumb'] - 1;
        echo '<div class="buttonADuser leftButtonADuser"><a href="indexV2.php?operation=ADuser&pageNumber=' . $aux . '">LEFT</a></div>';
    }

    if (getMaxPageTable($link, 5, "user") <= ($_SESSION['pageNumb'])) {
        echo '<div class="buttonADuser rightButtonADuser">RIGHT</div>';
    } else {
        $aux = $_SESSION['pageNumb'] + 1;
        echo '<div class="buttonADuser rightButtonADuser"><a href="indexV2.php?operation=ADuser&pageNumber=' . $aux . '">RIGHT</a></div>';
    }


    echo '</div>';
    echo '</div>';
}

?>

<script>
    var id, rIndex, table = document.getElementById('tableADuser');
    for (var i = 1; i < table.rows.length; i++) {
        table.rows[i].onclick = function () {
            // get the seected row index
            rIndex = this.rowIndex;
            id=table.rows[rIndex].cells[0].innerHTML;
            console.log(id);

            var javascriptVariable = id;
            window.location.href = "indexV2.php?operation=ADuser&id=" + javascriptVariable;
        };
    }
</script>