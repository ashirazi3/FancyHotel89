<?php
    include("main.php");
    ini_set('display_errors', '1');
    ini_set('error_reporting', E_ALL);

    echo "goes";
    if(isset($_POST['resIDSubmit'])){
        $conn = connectDB("FancyHotel");
        $_SESSION['reservationIdd'] = $_POST['resId'];
        $query = "SELECT Start_Date, End_Date FROM Reservation WHERE Reservation.ReservationID=".$_SESSION['reservationIdd'];
        $rs = selectQuery($conn, $query);
        while ($row = $rs->fetch_assoc()) {
            $_SESSION['Startdate'] = $row["Start_Date"];
            $_SESSION['Enddate'] = $row["End_Date"];
        }

    }

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
        <form action="updateReservation3.php" method="POST" role="form">
            <div style="margin-left:10px; margin-top: 100px; visibility: visible" id="updateDates">
                <table class="table" id="tableA">
                    <tr>
                        <td id="cellA">
                            <h3 style="color:  white;">Current Start Date</h3>
                        </td>
                        <td>
                            <?php
                                echo "<h3 style='color:white'>".$_SESSION['Startdate']."</h3>";
                            ?>
                            <!-- <input type="date"> -->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3 style="color:  white;">Current End Date</h3>
                        </td>
                        <td>
                            <?php
                                echo "<h3 style='color:white'>".$_SESSION['Enddate']."</h3>";
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3 style="color:  white;">New Start Date</h3>
                        </td>
                        <td>
                            <input id="newStart" name="newStart" type="date">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3 style="color:  white;">New End Date</h3>
                        </td>
                        <td>
                            <input id="newEnd" name="newEnd" type="date">
                        </td>
                    </tr>
                </table>
            <input type="submit" id="datesPush" name="datesPush" class="btn btn-primary" value="Check Availability">
            </div>
        </form>

    </body>
</html>
