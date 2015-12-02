<?php
    include("main.php");
    ini_set('display_errors', '1');
    ini_set('error_reporting', E_ALL);

    echo "goes";
    if(isset($_POST['datesPush'])){
        $conn = connectDB("FancyHotel");
        $_SESSION['newStartDate'] = $_POST['newStart'];
        $_SESSION['newEndDate'] = $_POST['newEnd'];
    }

    $query = "CREATE VIEW view1 AS SELECT Room_Num, Location, ReservationID FROM ReserveRoom  WHERE Room_Num IN  (SELECT Room_Num FROM ReserveRoom WHERE ReservationID =". $_SESSION['reservationIdd'] .")";

    $rs = selectQuery($conn, $query);

    $query2 =  'create view goodReservations
as select * 
from Reservation 
where (("'.$_SESSION['newStartDate'].'" < Start_Date and "'.$_SESSION['newEndDate'].'" < Start_Date and "'.$_SESSION['newStartDate'].'" < "'.$_SESSION['newEndDate'].'") or ("'.$_SESSION['newStartDate'].'" > End_Date and "'.$_SESSION['newEndDate'].'" > End_Date and "'.$_SESSION['newStartDate'].'" < "'.$_SESSION['newEndDate'].'") )
    and ReservationID in (select ReservationID from view1) and Is_Cancelled = "n"';
    $rs = selectQuery($conn, $query2);
    $conn->close();
    

    function printReservationRows($row, $i){
            echo "<tr>";
            echo "<td>".$row["Room_Num"]."</td>";
            echo "<td>".$row["Category"]."</td>";
            echo "<td>".$row["Num_People"]."</td>";
            echo "<td>". $row["Cost"]. "</td>";
            echo "<td>". $row["Cost_ExtraBed"]. "</td>";
            echo "<td style='text-align: center;''>
                <input type='checkbox' id='extraBed".$i."'>    
            </td>";
          echo "</tr>";
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

        <div style="visibility: visible; margin-left: 10px" id="confirmation">
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
                <?php
                    $conn = connectDB("FancyHotel");
                    $query3 = 'select * from Room where Room_Num in (select Room_Num from view1 where Room_Num not in (select Room_Num from view1
where ReservationID not in (select ReservationID from goodReservations))) and Location in (select Location from view1 where Room_Num not in (select Room_Num from view1
where ReservationID not in (select ReservationID from goodReservations)));';
                    $rs = selectQuery($conn, $query3);
                    $i = 0;
                    while ($row = $rs->fetch_assoc()) {
                        printReservationRows($row, $i);
                        $i = $i+1;
                    }
                    $conn->close();
                ?>
            </tbody>
           </table>
           <h3 id="totalPrice" name="totalPrice" style="margin-top: 50px; color:  white;">Total Cost Updated: $0</h3>

           <script>

                function updateTotal() {
                    var total = 0;
                    var start = new Date(<?php
                    echo "\"".$_SESSION["newStartDate"]."\"";
                ?>);
                    var end = new Date(<?php
                    echo "\"".$_SESSION["newEndDate"]."\"";
                ?>);
                    var days = Math.abs(end - start) / 86400000;
                    var rows = $("#tableBody").find("tr");
                    for (var i = 0; i < rows.length; i++) {
                        total += days * (parseFloat(rows[i].cells[3].innerHTML));
                            if ($("#extraBed" + i).is(':checked')) {
                                total += days * (parseFloat(rows[i].cells[4].innerHTML))
                            }
                    
                        console.log(total);

                        $("#totalPrice").text("Total Cost Updated: $"+total);
                    }


                }
                $(".btn").click(function () {
                    updateTotal();
                })
               updateTotal();
    </script>




           <form action="finalUpdate.php" method="POST" role="form">
                <input type="submit" id="update" name="update" class="btn btn-primary" value="Submit">
           </form>
           <hr style="background-color: #fff">
        </div>
        
    </div>

    </body>
</html>
