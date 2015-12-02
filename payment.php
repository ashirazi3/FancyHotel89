        <?php
        include("main.php");
        ini_set('display_errors', '1');
        ini_set('error_reporting', E_ALL);

        // echo "goes";
        if(isset($_POST['submit-card'])){
            $card_Number = $_POST['cardDropDown'];        
            if($card_Number == "Add new card"){
                $name = $_POST['cardName'];
                $cardNum = $_POST['cardNo'];
                $card_Number = $cardNum;
                $expirationDate = $_POST['expiry'] . "-30";
                $username = $_SESSION["username"];
                $cvv = $_POST['cvv'];
                $conn = connectDB("FancyHotel");
                $query = "INSERT INTO Payment VALUES ('$cardNum', '$name', \"$expirationDate\",'$cvv', '$username')";
                $rs = selectQuery($conn, $query);
                // $conn->close();
            }
            //         header("location: CustomerHome.php");
            $startDate = $_SESSION["startDate"];
            $endDate = $_SESSION["endDate"];
            $totalCost = $_POST['total'];
            $isCancelled = 'n';
            $username = $_SESSION["username"];
            // // echo $startDate;
            // // echo $endDate;
            // // echo $totalCost;
            // // echo $isCancelled;
            // // echo $username;
            // // echo $card_Number;
            // $conn = connectDB("FancyHotel");

            $query = "SELECT MAX(ReservationID) FROM Reservation";
            $rs2 = selectQuery($conn, $query);

            while($row = $rs2->fetch_assoc()){
                $id = intval($row["MAX(ReservationID)"]) +1;
            }

            $query = "INSERT INTO Reservation VALUES('$id', \"$startDate\", \"$endDate\", '$totalCost', 'n', '$username', '$card_Number')";
            $rs2 = selectQuery($conn, $query);

            


            foreach($_POST as $key=>$value){
                if(strpos($key,",") === false){
                }else{
                    $roomNum = explode(",",$key)[0];
                    $roomLocation = explode(",",$key)[1];
                    $bed = false;
                    foreach($_POST as $key=>$value){
                        if(strpos($key,"*bed".$roomNum) !== false){
                            // echo "room num is " . $room
                            $bed = true;
                        }
                    }
                    echo "adding " . $roomNum . " at " . $roomLocation. " with " . $bed;
                    if($bed){
                        $query = "INSERT INTO ReserveRoom VALUES ('$id', '$roomNum', '$roomLocation','y')";

                    }else{
                        $query = "INSERT INTO ReserveRoom VALUES ('$id', '$roomNum', '$roomLocation','n')";
                    }
                    $rs = selectQuery($conn, $query);
                }            
                
            }


            $conn->close();






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