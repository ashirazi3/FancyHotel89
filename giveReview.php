<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Give Review</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
<form id="give-review" action="main.php" method="POST" role="form">
<h1>
    Give Review
</h1>

<h3>
    Hotel Location:

    <select name="location">
<!--        --><?php
        include("main.php");
        $conn = connectDB("FancyHotel");
        $query = "SELECT Location, Start_Date FROM Reservation, ReserveRoom WHERE Username='" . $_SESSION["username"] . "' ORDER BY Start_Date;";
        $rs = selectQuery($conn, $query);
        while($row = $rs->fetch_assoc()){
            echo '<option value="'.$row["Location"].'">'.$row["Location"].' on '.$row["Start_Date"].'</option>';
        }
//        ?>
    </select>
</h3>

<h3>
    Rating:

    <select name = "rating">
        <option value="5">Excellent</option>
        <option value="4">Good</option>
        <option value="3">Neutral</option>
        <option value="2">Bad</option>
        <option value="1">Very Bad</option>
    </select>
</h3>

<h3>
    Comment:
    <input type="text" name="comment" maxlength="250">
</h3>

<div class="wrapper">
    <button type="sumbit" name="give-review-submit" id="give-review-submit" tabindex="4">Submit</button>
</div>
</form>




</body>
</html>