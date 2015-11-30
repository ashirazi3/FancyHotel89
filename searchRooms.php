<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Search Rooms</title>
        <link rel="stylesheet" href="styles/hover.css">
        <style>
            
            .element{
                width: 20%;
            }
             body {
                 background: url('hotel.jpg') no-repeat center center fixed; 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            } 
        </style>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="scripts/pageOptions.js"></script>
    </head>
    <body>
        <div>
            <h1 style="color: white; margin-left: 10px">Search Rooms</h1>
        </div>
        <form id="search-form" action="makeReservation.php" method="POST" role="form" style="display: block;">
        <div class="container" style="margin-left: 10px">
            <h2 style="color: white">Location</h2>
            <select class="element" name="locations" form="search-form">
                <option value="Atlanta">Atlanta</option>
                <option value="Charlotte">Charlotte</option>
                <option value="Savannah">Savannah</option>
                <option value="Orlando">Orlando</option>
                <option value="Miami">Miami</option>
            </select>
            <h2 style="color: white">Start Date</h2>
            <input class="element" type="date" name="startDate" min="2000-01-02"><br>
            <h2 style="color: white">End Date</h2>
            <input class="element "type="date" name="endDate" min="2000-01-02"><br>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-3 col-sm-offset-3">
                        <input type="submit" name="search-room-submit" id="search" tabindex="4" class="form-control btn btn-login" value="Search">
                    </div>
                </div>
            </div>
        </div>
        </form>
    </body>
</html>
