<?php
include('main.php');
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

if (isset($_POST['search-room-submit'])) {
    if (empty($_POST['locations']) || empty($_POST['startDate']) || empty($_POST['endDate'])) {
        $error = "Invalid Selection";
    } else {
//        echo 'HEY, IM HERE';
        $_SESSION['location'] = $_POST['locations'];
        $_SESSION['startDate'] = $_POST['startDate'];
        $_SESSION['endDate'] = $_POST['endDate'];
//        $conn = connectDB("FancyHotel");
//        $query = 'SELECT * FROM Room WHERE Location ="' . $location . '" AND Room_Num NOT IN (SELECT Room_Num from ReserveRoom, Reservation WHERE Start_Date >"' . $endDate . '" OR End_Date <"' . $startDate . '" AND ReserveRoom.ReservationID = Reservation.ReservationID)';
//        $rs = selectQuery($conn, $query);
//        $_SESSION['username'] = $username;   // Initializing Session
//        echo 'HEY, IM HERE';
        #header("location: makeReservation.php");        // Redirecting To Transfers Page
//        $conn->close();
    }
}

function printTableRow($row, $i)
{
    echo "<tr>";
    echo "<td>" . $row["Room_Num"] . "</td>";
    echo "<td>" . $row["Category"] . "</td>";
    echo "<td>" . $row["Num_People"] . "</td>";
    echo "<td>" . $row["Cost"] . "</td>";
    echo "<td>" . $row["Cost_ExtraBed"] . "</td>";
    echo '<td><input name="*bed'.$row["Room_Num"].'" id="bed"'. $i . '" type="checkbox" name="Extra Bed"></td>';
    echo '<td><input id="' . $i . '" type="checkbox" name="' . $row["Room_Num"] . ',' . $row["Location"] . '"></td>';

    echo "</tr>";
}

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Make a Reservation</title>
    <style>
        .element {
            width: 20%;
            margin-left: 40%;
        }

        body {
            background: url('hotel.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        th {
            color: black;

        }

        tr {
            text-align: center;
        }

        h3 {
            text-align: center;
        }

    </style>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
</head>
<body>
<div>
</div>
<div class="container">
    <h1 style="text-align: center; color: white">Make a Reservation</h1>
    <?php
    echo "<h3 style=\"text-align: center; color: white\">" . $_SESSION["startDate"] . " to " . $_SESSION["endDate"] . "</h3>"
    ?>

    <form action="payment.php" method="POST" role="form">
        <table style="margin-top: 50px; background: silver" class="table table-striped">
            <thead>
            <tr id="theHead">
                <th>Room Number</th>
                <th>Room Category</th>
                <th>Num of Persons Allowed</th>
                <th>Cost per Day</th>
                <th>Cost: Extra Bed/Day</th>
                <th>Extra Bed</th>
                <th>Select Room</th>
            </tr>
            </thead>
            <tbody id="rooms">
            <?php
            $conn = connectDB("FancyHotel");
            //            $query = 'SELECT * FROM Room WHERE Location = "Atlanta" AND Room_Num NOT IN (SELECT Room_Num from ReserveRoom, Reservation WHERE NOT (Start_Date >"2015-11-04" OR End_Date <"2015-11-03") AND (ReserveRoom.ReservationID = Reservation.ReservationID))';
            $query = 'SELECT * FROM Room WHERE Location = "' . $_SESSION["location"] . '" AND Room_Num NOT IN (SELECT Room_Num from ReserveRoom, Reservation WHERE NOT (Start_Date >"' . $_SESSION["endDate"] . '" OR End_Date <"' . $_SESSION["startDate"] . '") AND (ReserveRoom.ReservationID = Reservation.ReservationID))';
            $rs = selectQuery($conn, $query);
            $j = 0;
            while ($row = $rs->fetch_assoc()) {
                printtableRow($row, $j);
                $j++;
            }
            $conn->close();
            ?>
            <!-- //   ini_set('display_errors', '1');
            //   ini_set('error_reporting', E_ALL);
              // echo 'Fuck Off';
              // session_start();
              // $error = '';

              // function connectDB($dbname) {
              //   //all you need to change is this to connect to your database
              //   $conn = new mysqli("localhost", "root", "Learned2015", $dbname);
              //   // check connection
              //   if ($conn->connect_error) {
              //   trigger_error('Database connection failed: ' . $conn->connect_error, E_USER_ERROR);
              //   }
              //   return $conn;
              } -->
            <!--
              <tr>
                <td>111</td>
                <td>Standard</td>
                <td>2</td>
                <td>100</td>
                <td>70</td>
                <td style="text-align: center;">
                    <input type="checkbox" name="extraBed">
                </td>
              </tr> -->

            </tbody>
        </table>

    <button style="margin-left: 44.5%;" type="button" class="btn btn-primary" onclick="nextSelection();">Check
        Details
    </button>
</div>


<div style="visibility: hidden; padding-top: 100px; padding-bottom: 100px" id="selectRoom" class="container">

    <script>

        function updateTotal() {
            var total = 0;
            var start = new Date(<?php
            echo "\"".$_SESSION["startDate"]."\"";
        ?>);
            var end = new Date(<?php
            echo "\"".$_SESSION["endDate"]."\"";
        ?>);
            var days = Math.abs(end - start) / 86400000;
            var rows = $("#rooms").find("tr");
            for (var i = 0; i < rows.length; i++) {
                if ($("#" + i).is(':checked')) {
                    total += days * (parseFloat(rows[i].cells[3].innerHTML));
                    if ($("#bed" + i).is(':checked')) {
                        total += days * (parseFloat(rows[i].cells[4].innerHTML))
                    }
                }
                console.log(total);
                $("#totalCost").text("Total Cost: $"+total);
                $("#total").val(total);
            }


        }
        $(".btn").click(function () {
            updateTotal();
        })
        //        updateTotal();
    </script>

            <h3 id="totalCost" class="h3" style="color: white">Total Cost: $0</h3>
            <input name="total" id="total" type="text" style="visibility: hidden">
            <h3 class="h3" style="color: white">Use Card:</h3>

            <div>
                <select id="cardDropDown" class="element" name="cardDropDown">
                    <?php

                    function printCard($row)
                    {
                        echo "<option name=\"" . $row["Card_Num"] . "\">" . $row["Card_Num"] . "</option>";
                    }

                    $conn = connectDB("FancyHotel");
                    $query = "SELECT Card_Num FROM Payment WHERE NAME =\"" . $_SESSION["username"] . "\"";
                    $rs = selectQuery($conn, $query);
                    while ($row = $rs->fetch_assoc()) {
                        printCard($row);
                    }
                    $conn->close();
                    ?>
                    <option id="cardNew" value="Add new card">Add new card</option>
                </select>
            </div>
           <!--  <button style="margin-left: 44.5%; margin-top: 10px; width: 10%" type="button" class="btn btn-warning"
                    onclick="addPayment();">Add Card
            </button> -->

            <div id="addNewCard" style="visibility: hidden; text-align: center">
                <h3 style="color:white"> Add a new card:</h3>
                <br>
                <input name="cardName" id="cardName" type="text" placeholder="Name on card">
                <input name="cardNo" id="cardNo" type="number" max="9999999999999999" placeholder="Card Number">
                <input name="expiry" id="expiry" type="text" placeholder="yyyy-mm" placeholder="yyyy-mm">
                <input name="cvv" id="cvv" type="number" max="999" placeholder="CVV">
                <br>
            </div>
            <script>
                $("#cardDropDown").val($("#cardDropDown option:first").val());
                $("#cardDropDown").change(function(){
                    var add = document.getElementById("cardDropDown");
                    if(add.options[add.selectedIndex].value == "Add new card"){
                        document.getElementById("addNewCard").style.visibility = "visible";
                    }
                })
            </script>
            <!-- <button style="margin-left: 44.5%; margin-top: 30px; width: 10%" type="button" class="btn btn-primary"
                    onclick="confirm();">Submit
            </button> -->
            <br>
            <input type="submit" name="submit-card" id="submit-card" tabindex="4" class="form-control btn btn-primary" value="Submit" style="width:10%; margin-left: 45%">
    </form>


</div>
<script type="text/javascript" src="scripts/makeReservation.js"></script>
</body>
</html>