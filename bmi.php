<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>BeFit.</title>
</head>
<body>
    <header>
        <a href="index.php" class="home-link">
            <h1>Maturitní projekt</h1>
        </a>
        <a href="login.php" class="login-btn">Přihlásit se</a>
    </header>
    <form method="post" action="">
    <label for="height">Height:</label>
    <input type="text" name="height" id="height" placeholder="Enter height">
    <select name="heightUnit">
        <option value="centimeter">Centimeter</option>
        <option value="inch">Inch</option>
        <option value="foot">Foot</option>
        <option value="meter">Meter</option>
    </select>

    <br>

    <label for="weight">Weight:</label>
    <input type="text" name="weight" id="weight" placeholder="Enter weight">
    <select name="weightUnit">
        <option value="kilogram">Kilogram</option>
        <option value="pound">Pound</option>
    </select>

    <br>

    <input type="submit" value="Calculate BMI">
    </form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Height = $_POST['height'];
    $HeightUnit = $_POST['heightUnit'];
    $Weight = $_POST['weight'];
    $WeightUnit = $_POST['weightUnit'];

    if ($Height == '' || $Weight == '' || $HeightUnit == '' || $WeightUnit == '') {
        $Error = "The input values are required.";
    } elseif (filter_var($Height, FILTER_VALIDATE_FLOAT) === false || filter_var($Weight, FILTER_VALIDATE_FLOAT) === false) {
        $Error = "The input value must be a number only.";
    } else {
        /*Calculation begins from here.*/
        /*Convert cm to inch -> foot to inch -> meter to inch */
        $HInches = ($HeightUnit == 'centimeter') ? $Height * 0.393701 : (($HeightUnit == 'foot') ? $Height * 12 : (($HeightUnit == 'meter') ? $Height * 39.3700787 : $Height));
        /*Convert kg to pound*/
        $WPound = ($WeightUnit == 'kilogram') ? $Weight * 2.2 : $Weight;
        $BMIIndex = round($WPound / ($HInches * $HInches) * 703, 2);

        /*Set Message*/
        if ($BMIIndex < 18.5) {
            $Message = "Underweight";
        } else if ($BMIIndex <= 24.9) {
            $Message = "Normal";
        } else if ($BMIIndex <= 29.9) {
            $Message = "Overweight";
        } else {
            $Message = "Obese";
        }

        echo "<p>Your BMI: $BMIIndex</p>";
        echo "<p>Result: $Message</p>";
    }
}
?>
</body>
</html>