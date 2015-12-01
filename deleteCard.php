<?php
include("main.php");

function printCards($row){
    echo "<option name=\"".$row["Card_Num"]."\">".$row["Card_Num"]."</option>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Give Review</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
<form id="delete-card" action="CustomerHome.php" method="POST" role="form">
    <h1>
        Select a Card to Delete
    </h1>

    <h3>
        Card Number

        <select name="cardNum" tabindex="1">
            <!--        --><?php
//            include("main.php");
            $conn = connectDB("FancyHotel");
            $query = "SELECT Card_Num FROM Payment WHERE Username='" . $_SESSION["username"] . "'";
            $rs = selectQuery($conn, $query);
            while($row = $rs->fetch_assoc()){
                echo '<option name="'.$row["Card_Num"].'">'.$row["Card_Num"].'</option>';
            }
            //        ?>
        </select>
    </h3>
    <button type="cancel" href="CustomerHome.php>">Cancel</button>
    <button type="sumbit" name="delete-card-submit" id="delete-card-submit" tabindex="3">Delete Card</button>
</form>




</body>
</html>
