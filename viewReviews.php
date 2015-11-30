<?php

include('main.php');
function printReviewRow($row)
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Reviews</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/table.css">
    <script src="scripts/custom.js"></script>
</head>


<h1>
    View Review
</h1>

<h3>
    Hotel Location:

    <select id="locationSelect">
        <option value="Atlanta">Atlanta</option>
        <option value="Charlotte">Charlotte</option>
        <option value="Miami">Miami</option>
        <option value="Orlando">Orlando</option>
        <option value="Savannah">Savannah</option>
    </select>
</h3>

<div class="wrapper">
    <button id="show">
        Check Reviews
    </button>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#show").click(function () {
            $("#tableContainer").find("table").hide();
            $("#"+$("#locationSelect").val()+"ReviewTable").show();
            console.log($("#"+$("#locationSelect").val()+"ReviewTable"));
        });
    });
</script>

<br>
<br>

<div class="fancyTable" id="tableContainer">
    <table id="AtlantaReviewTable" style="display:none">
        <tr>
            <td>
                Rating
            </td>
            <td>
                Comment
            </td>
        </tr>
        <?php
        $conn = connectDB("FancyHotel");
        $query = 'SELECT Rating, Comment FROM Review WHERE Location="Atlanta"';
        $rs = selectQuery($conn, $query);

        while ($row = $rs->fetch_assoc()) {
            printReviewRow($row);
        }
        $conn->close();
        ?>
    </table>
    <table id="CharlotteReviewTable" style="display:none">
        <tr>
            <td>
                Rating
            </td>
            <td>
                Comment
            </td>
        </tr>
        <?php
        $conn = connectDB("FancyHotel");
        $query = 'SELECT Rating, Comment FROM Review WHERE Location="Charlotte"';
        $rs = selectQuery($conn, $query);

        while ($row = $rs->fetch_assoc()) {
            printReviewRow($row);
        }
        $conn->close();

        ?>
    </table>
    <table id="SavannahReviewTable" style="display:none">
        <tr>
            <td>
                Rating
            </td>
            <td>
                Comment
            </td>
        </tr>
        <?php
        $conn = connectDB("FancyHotel");
        $query = 'SELECT Rating, Comment FROM Review WHERE Location="Savannah"';
        $rs = selectQuery($conn, $query);

        while ($row = $rs->fetch_assoc()) {
            printReviewRow($row);
        }
        $conn->close();

        ?>
    </table>
    <table id="OrlandoReviewTable" style="display:none">
        <tr>
            <td>
                Rating
            </td>
            <td>
                Comment
            </td>
        </tr>
        <?php
        $conn = connectDB("FancyHotel");
        $query = 'SELECT Rating, Comment FROM Review WHERE Location="Orlando"';
        $rs = selectQuery($conn, $query);

        while ($row = $rs->fetch_assoc()) {
            printReviewRow($row);
        }
        $conn->close();

        ?>
    </table>
    <table id="MiamiReviewTable" style="display:none">
        <tr>
            <td>
                Rating
            </td>
            <td>
                Comment
            </td>
        </tr>
        <?php
        $conn = connectDB("FancyHotel");
        $query = 'SELECT Rating, Comment FROM Review WHERE Location="Miami"';
        $rs = selectQuery($conn, $query);

        while ($row = $rs->fetch_assoc()) {
            printReviewRow($row);
        }
        $conn->close();

        ?>
    </table>
</div>


</body>
</html>