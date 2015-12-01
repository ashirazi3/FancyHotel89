    <?php
    include("main.php");
    ini_set('display_errors', '1');
    ini_set('error_reporting', E_ALL);

    // echo "goes";
    if(isset($_POST['submit-card'])){
        $selection = $_POST['cardDropDown'];
        if($selection == "Add new card"){
            $name = $_POST['cardName'];
            $cardNum = $_POST['cardNo'];
            $expirationDate = $_POST['expiry'] . "-30";
            $username = $_SESSION["username"];
            $cvv = $_POST['cvv'];
            $conn = connectDB("FancyHotel");
            $query = "INSERT INTO Payment VALUES ('$cardNum', '$name', \"$expirationDate\",'$cvv', '$username')";
            $rs = selectQuery($conn, $query);
            $conn->close();

        }
    
    }
    // if (isset($_POST['submit-card'])) {
    //     // echo "goes in if";
    //         $name = $_POST['cardName'];
    //         echo "name " . $name;
    //         $cardNum = $_POST['cardNo'];
    //         $expirationDate = $_POST['expiry'] . "-30";
    //         $username = $_SESSION["username"];
    //         // echo "date" .$expirationDate;
    //         $cvv = $_POST['cvv'];
    //         // echo "Details " . $name . $cardNum .  $expirationDate . $cvv . $_SESSION["username"];
    //         $conn = connectDB("FancyHotel");
    //         // echo "INSERT INTO Payment VALUES('".$cardNum."' , '".$name"' , '".$expirationDate"' , '".$cvv."' , '".$username."')";
    //         $query = "INSERT INTO Payment VALUES ('$cardNum', '$name', \"$expirationDate\",'$cvv', '$username')";
    //         $rs = selectQuery($conn, $query);
    //         $conn->close();

    //         header("location: makeReservation.php");        // Redirecting To Transfers Page
    // }

    ?>