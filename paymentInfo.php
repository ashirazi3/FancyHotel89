<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Payment Information</title>
        <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src="scripts/paymentInfo.js"></script>
        <style>
            body {
             background: url('hotel.jpg') no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            } 
        </style>
    </head>
    <body>
        <h1 style="margin-left: 10px; color: white">Payment Information</h1>

        <div id="addCard" style="margin: 10px">
            <form id="saveCard" action="payment.php" method="POST" role="form" style="display: block;">
                <h2 style="margin-left: 10px; margin-top: 60px;margin-bottom: 30px; color:  white">Add Card</h2>
                <table class="table" >
                    <tr>
                        <td id="cardInfo">
                            <h3 style="color:  white;">Name on Card</h3>
                        </td>
                        <td>
                            <input name="cardName" id="cardName" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3 style="color:  white;">Card Number</h3>
                        </td>
                        <td>
                            <input name="cardNo" id="cardNo" type="number" max="9999999999999999">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3 style="color:  white;">Expiration Date</h3>
                        </td>
                        <td>
                            <input name="expiry" id="expiry" type="text" placeholder="yyyy-mm">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3 style="color:  white;">CVV</h3>
                        </td>
                        <td>
                            <input name="cvv" id="cvv" type="number" max="999">
                        </td>
                    </tr>
                </table>
                
                    <!--button class="btn btn-primary" onclick="submit();">Save</button-->
                    <input style="width: 10%" type="submit" name="submit-card" id="submit-card" class="form-control btn btn-primary" value="Save" >

            </form>
            <hr style="background-color: #fff">
            <button class="btn btn-primary" onclick="deleteCard();">Delete an Existing Card</button>
            </div>
            <div id="deleteCard" style="visibility: hidden; margin-left: 10px">
                <table class="table" id="blah">
                    <tr>
                        <td>
                            <h3 style="color:  white;">Card Number: </h3>
                        </td>
                        <td>
                            <select class="element" name="locations">
                                <option value="card1">*8192</option>
                                <option value="card1">*7242</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <button class="btn btn-primary" onclick="submit();">Delete</button>
            </div>
        
        
        
        </div>

    </body>
</html>
