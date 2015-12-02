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
    	<form action="updateReservation2.php" method="POST" role="form">
	        <h1 style="color:  white; margin-left: 10px">Update Reservation</h1>

	        <div class="inlineDiv">
	            <h3 style="color: white">Reservation ID</h3>
	        </div>
	        <div class="inlineDiv">
	            <input id="resId" name="resId" id="resId" type="number" min="0">

	        </div>
	        <div class="inlineDiv">
	        	
	            	<input type="submit" name="resIDSubmit" id="resIDSubmit" class="btn btn-primary" value="Submit">
	           
	        </div>
        </form>
        
    </body>
</html>
