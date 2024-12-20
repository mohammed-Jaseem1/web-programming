<?php
// Array of Indian cricket players with their positions
$players = [
    ["name" => "Virat Kohli", "position" => "Batsman(C)"],
    ["name" => "Rohit Sharma", "position" => "Batsman(VC)"],
    ["name" => "MS Dhoni", "position" => "Wicketkeeper-Batsman"],
    ["name" => "Sachin Tendulkar", "position" => "Batsman"],
    ["name" => "Kapil Dev", "position" => "All-rounder"],
    ["name" => "Shikhar Dhawan", "position" => "Batsman"],
    ["name" => "Hardik Pandya", "position" => "All-rounder"],
    ["name" => "Ravindra Jadeja", "position" => "All-rounder"],
    ["name" => "KL Rahul", "position" => "Batsman/Wicketkeeper"],
    ["name" => "Ravichandran Ashwin", "position" => "Bowler"]
];
?>

<html>
<head>
    <title>Indian Cricket Players</title>
    <style>
        table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">Indian Cricket Players</h2>

<table>
    <tr>
        <th>S.No</th>
        <th>Player Name</th>
        <th>Position</th>
    </tr>

    <?php
    // Loop through the players array and display each player along with their position in the table
    $serial_no = 1;
    foreach ($players as $player) {
        echo "<tr>";
        echo "<td>" . $serial_no . "</td>";
        echo "<td>" . $player['name'] . "</td>";
        echo "<td>" . $player['position'] . "</td>";
        echo "</tr>";
        $serial_no++;
    }
    ?>

</table>

</body>
</html>

