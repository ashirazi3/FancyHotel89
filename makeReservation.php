
<?php
include('main.php');
function printTableRow($row)
{
    echo "<tr>";
    if ($row["Rating"] == 5) {
        echo "<td>Excellent</td>";
    } else if ($row["Rating"] == 4) {
        echo "<td>Good</td>";
    } else if ($row["Rating"] == 3) {
        echo "<td>Neutral</td>";
    } else if ($row["Rating"] == 2) {
        echo "<td>Bad</td>";
    } else {
        echo "<td>Very Bad</td>";
    }
    echo "<td>" . $row["Comment"] . "</td>";
    echo "</tr>";
}
?>
<html lang="en"><head>
        <meta charset="utf-8">
        <title>Make a Reservation</title>
        <style>
            .element{
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
            th{
                color: white;
                
            }
            tr{
                text-align: center;
            }
            h3{
                text-align: center;
            }
           
        </style>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="scripts/makeReservation.js"></script>
    </head>
    <body>
    <div>
    <?php
      include('main.php');
      echo "<h1> Welcome ". $_SESSION['username'] .",</h1>";
    ?>
    </div>
        <div class="container">
          <h1 style="text-align: center; color: white">Make a Reservation</h1>
          <table style="margin-top: 50px" class="table table-striped">
            <thead>
              <tr id="theHead">
                <th>Room Number</th>
                <th>Room Category</th>
                <th>Num of Persons Allowed</th>
                <th>Cost per Day</th>
                <th>Cost: Extra Bed/Day</th>
                <th>Select Room</th>
              </tr>
            </thead>
            <tbody>
            <div>
              <?php 
                session_start();
                $error = '';                
                function connectDB2($dbname) {
                  $conn = new mysqli("localhost", "root", "Learned2015", $dbname);
                  if ($conn->connect_error) {
                    trigger_error('Database connection failed: ' . $conn->connect_error, E_USER_ERROR);
                  }
                  return $conn;
                }
                function selectQuery2($conn, $query) {
                  $rs = $conn->query($query);
                  if (!$rs) {
                      trigger_error('Wrong SQL: ' . $query . ' Error: ' . $conn->error, E_USER_ERROR);
                  } else {
                      // $rows_returned = $rs->num_rows;
                  }
                  return $rs;
                }
                if (isset($_POST['search'])) {
                  if (empty($_POST['locations']) || empty($_POST['startDate']) || empty($_POST['endDate'])) {
                      $error = "Invalid Selection";
                  } else {
                      $location = $_POST['locations'];
                      $startDate = $_POST['startDate'];
                      $endDate = $_POST['endDate'];
                      $conn = connectDB2("FancyHotel");
                      $query = "SELECT * FROM Room WHERE Location = 'Atlanta';";
                      $rs = selectQuery2($conn, $query);
                      while ($row = $rs->fetch_assoc()) {
                        echo "HI THERE";
                        echo $row['Row_Num'];
                        printtableRow($row);
                      }
                  }
                }       
              ?>
            </div>
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
            <!--<?php
              function tableRow() {
                #echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";
              }
            ?>-->
            </tbody>
           </table>
           <button style="margin-left: 44.5%;" type="button" class="btn btn-primary" onclick="nextSelection();">Check Details</button>
        </div>


        <div style="visibility: hidden; padding-top: 100px; padding-bottom: 100px" id="selectRoom" class="container">
          <table style="margin-top: 50px" class="table table-striped">
            <thead id="tableHead">
              <tr>
                <th>Room Number</th>
                <th>Room Category</th>
                <th>Num of Persons Allowed</th>
                <th>Cost per Day</th>
                <th>Cost: Extra Bed/Day</th>
                <th>Extra Bed</th>
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
            
           <h3 class="h3" style="color: white">Start Date</h3>
           <input class="element" type="date" name="startDate" min="2000-01-02"><br>
           <h3 class="h3" style="color: white">End Date</h3>
           <input class="element " type="date" name="endDate" min="2000-01-02"><br>
           <h3 class="h3" style="color: white">Total Cost: $1100</h3>
           <h3 class="h3" style="color: white">Use Card:</h3>
           <div>
               <select class="element" name="locations">
                <option value="card1">*8192</option>
                </select>
           </div>
           <button style="margin-left: 44.5%; margin-top: 10px; width: 10%" type="button" class="btn btn-warning" onclick="addPayment();">Add Card</button>
           <button style="margin-left: 44.5%; margin-top: 30px; width: 10%" type="button" class="btn btn-primary" onclick="confirm();">Submit</button>
           
        
    

</div></body></html>