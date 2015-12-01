<?php
include("main.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cancel Reservation</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/table.css">
</head>
<body>
<div style="text-align:center;">
    <h1>
        Cancel Reservation
    </h1>

    <form action="cancelReservationTable.php" method="POST" role="form">
        <h3>
            Reservation Id:
            <input name="reservationId" type="text">
        </h3>
        <button class="" type="submit" name="reservationId-submit">SUBMIT</button>
    </form>
</div>
</body>