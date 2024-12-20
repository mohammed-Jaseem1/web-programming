<!DOCTYPE html>
<html>
<head>
<title>KSEB Bill</title>
<style>
body { font-family: sans-serif; }
.form-container { width: 350px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; }
label { display: block; margin-bottom: 5px; }
input[type="text"], input[type="number"] { width: 90%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; }
input[type="submit"] { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; cursor: pointer; }
.bill-container { width: 500px; margin: 20px auto; padding: 15px; border: 1px solid #ccc; }
table { width: 100%; border-collapse: collapse; }
th, td { padding: 6px; text-align: left; border: 1px solid #ccc; }
.header { text-align: center; margin-bottom: 10px; }
.right-align { text-align: right; }
.center-align {text-align: center;}
</style>
</head>
<body>

<div class="form-container">
  <h2>KSEB Bill</h2>
  <form method="post" action="">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>
    <label for="consumerId">Consumer ID:</label>
    <input type="text" name="consumerId" id="consumerId" required>
    <label for="currentReading">Unit consumed:</label>
    <input type="number" name="currentReading" id="currentReading" required>
    <input type="submit" value="Generate">
  </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $unit = $_POST["currentReading"];
  $energyCharges = ($unit <= 300) ? $unit * 6.40 : (($unit <= 350) ? $unit * 7.25 : (($unit <= 400) ? $unit * 7.60 : (($unit <= 500) ? $unit * 7.90 : $unit * 8.80)));
  echo "<div class='bill-container'><div class='header'><h2>KSEB</h2><h3>ELECTRICITY BILL</h3></div><table><tr><td>Bill No. 1</td></tr><tr><td>Consumer no: C#" . $_POST["consumerId"] . "</td></tr><tr><td>Name: " . $_POST["name"] . "</td></tr><tr><td>Address: VENGAYIL</td></tr><tr><td>Bill Date: " . date("d/m/Y") . "</td></tr><tr><td>Due Date: " . date("d/m/Y", strtotime("+15 days")) . "</td></tr><tr><td>Disconn Dt: " . date("d/m/Y", strtotime("+30 days")) . "</td></tr></table><table><tr><th class='center-align'>Unit</th><th class='center-align'>Curr</th><th class='center-align'>Cons</th></tr><tr><td class='center-align'>KWH/A/I</td><td class='center-align'>" . $unit . "</td><td class='center-align'>" . $unit . "</td></tr></table><table><tr><td>Energy Charges:</td><td class='right-align'>" . number_format($energyCharges, 2) . "</td></tr><tr><td>Other Charges:</td><td class='right-align'>60.00</td></tr><tr><td>Payable:</td><td class='right-align'>" . number_format($energyCharges + 60) . "</td></tr></table><p class='right-align'>Pay Online www.kseb.in</p></div>";
}
?>
</body>
</html>
