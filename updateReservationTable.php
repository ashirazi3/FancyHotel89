<?php

?>

<?php
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Update Reservation</title>
    <style>
        .inlineDiv {
            font-size: 150%;
            width: 100%;
            height: 100%;
            line-height: 100%;

            padding:  10px;
            margin-left: 10px;
            position: relative;
        }
        body {
            background: url('hotel.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        hr {
            border: none;
            height: 1px;
            /* Set the hr color */
            color: #333; /* old IE */
            background-color: #333; /* Modern Browsers */
        }
        h3{
            color: white;
        }
    </style>
    <script type="text/javascript" src="scripts/updateReservation.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<hr style="background-color: #fff">

<div style="margin-left:10px; margin-top: 100px; visibility: hidden" id="updateDates">
    <table class="table" id="tableA">
        <tr>
            <td id="cellA">
                <h3 style="color:  white;">Current Start Date</h3>
            </td>
            <td>
                <input type="date">
            </td>
        </tr>
        <tr>
            <td>
                <h3 style="color:  white;">Current End Date</h3>
            </td>
            <td>
                <input type="date">
            </td>
        </tr>
        <tr>
            <td>
                <h3 style="color:  white;">New Start Date</h3>
            </td>
            <td>
                <input type="date">
            </td>
        </tr>
        <tr>
            <td>
                <h3 style="color:  white;">New End Date</h3>
            </td>
            <td>
                <input type="date">
            </td>
        </tr>
    </table>
    <button class="btn btn-primary" onclick="checkAvail();">Check Availability</button>
    <hr style="background-color: #fff">

    <div style="visibility: hidden; margin-left: 10px" id="confirmation">
        <h3 id="message" style="color:  white;">Rooms are available. Please confirm details below before submitting</h3>
        <table style="margin-top: 50px" class="table table-striped">
            <thead id="tableHead" style="color: white">
            <tr>
                <th>Room Number</th>
                <th>Room Category</th>
                <th>Num of Persons Allowed</th>
                <th>Cost per Day</th>
                <th>Cost: Extra Bed/Day</th>
                <th>Select Extra Bed</th>
            </tr>
            </thead>
            <tbody id="tableBody">
            <tr>
                <td>321</td>
                <td>Standard</td>
                <td>2</td>
                <td>200</td>
                <td>40</td>
                <td style="text-align: center;">
                    <input type="checkbox" name="extraBed">
                </td>
            </tr>
            </tbody>
        </table>
        <h3 style="margin-top: 50px; color:  white;">Total Cost Updated: $1340</h3>
        <button class="btn btn-primary" onclick="submit();">Submit</button>
        <hr style="background-color: #fff">
    </div>

</div>

</body>
</html>


