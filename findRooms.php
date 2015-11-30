<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

session_start();
$error = '';

function connectDB($dbname)
{
    //all you need to change is this to connect to your database
    $conn = new mysqli("localhost", "root", "Learned2015", $dbname);
    // check connection
    if ($conn->connect_error) {
        trigger_error('Database connection failed: ' . $conn->connect_error, E_USER_ERROR);
    }
    return $conn;
}

function selectQuery($conn, $query)
{
    $rs = $conn->query($query);
    if (!$rs) {
        trigger_error('Wrong SQL: ' . $query . ' Error: ' . $conn->error, E_USER_ERROR);
    } else {
        // $rows_returned = $rs->num_rows;
    }
    return $rs;
}

if (isset($_POST['searchRooms'])) {
    if (empty($_POST['locations']) || empty($_POST['startDate']) || empty($_POST['endDate'])) {
        $error = "Invalid Selection";
    } else {
        echo 'HEY, IM HERE'
        $location = $_POST['locations'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $conn = connectDB("FancyHotel");
        $query = "SELECT * FROM Room WHERE Location ='" . $location . "' AND Room_Num NOT IN (SELECT Room_Num from ReserveRoom, Reservation WHERE Start_Date >'" . $endDate . "' OR End_Date <'" . $startDate . "' AND ReserveRoom.ReservationID = Reservation.ReservationID;";
        $rs = selectQuery($conn, $query);
        $_SESSION['username'] = $username;   // Initializing Session
        $_SESSION['location'] = $location;
        $_SESSION['startDate'] = $startDate;
        $_SESSION['endDate'] = $endDate;
        echo 'HEY, IM HERE'
        #header("location: makeReservation.php");        // Redirecting To Transfers Page
        $conn->close();
    }
}
?>