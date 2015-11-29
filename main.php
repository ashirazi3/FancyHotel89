<?php
//ini_set('display_errors', '1');
//ini_set('error_reporting', E_ALL);

session_start();
$error = '';

function connectDB($dbname)
{
    //all you need to change is this to connect to your database
    $conn = new mysqli("localhost", "root", "root", $dbname);
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

if (isset($_POST['login-submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $conn = connectDB("FancyHotel");
        $query = "SELECT * FROM User WHERE Password='" . $password . "' AND Email='" . $username . "';";
        $rs = selectQuery($conn, $query);


        if ($rs->num_rows == 1) {
            $_SESSION['username'] = $username;    // Initializing Session
            header("location: CustomerHome.php");        // Redirecting To Transfers Page
        } else {
            $error = "Username or Password is invalid";
            echo $error;
        }
        $conn->close();
    }
}

if (isset($_POST['register-submit'])) {
//    if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password1']) || empty($_POST['confirm-password'])) {
//        echo "fsfd";
//    }else if($_POST['password1'] != $_POST['confirm-password']){
//
//    }else{
//
//    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $conn = connectDB("FancyHotel");
    $query = "INSERT INTO User(Username, Email, Password, IsManager) VALUES ('$username','$email','$password', 'n')";
    $rs = selectQuery($conn, $query);
}



?>