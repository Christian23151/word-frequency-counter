<!DOCTYPE html>
<html>
<head>
    <title>Triangle Area Calculator</title>
</head>
<body>
    <h2>Calculate the Area of a Triangle</h2>
    <form method="POST">
        Side 1: <input type="number" step="any" name="side1" required><br>
        Side 2: <input type="number" step="any" name="side2" required><br>
        Side 3: <input type="number" step="any" name="side3" required><br>
        <input type="submit" name="submit" value="Calculate">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $side1 = $_POST['side1'];
        $side2 = $_POST['side2'];
        $side3 = $_POST['side3'];
        
        
        $s = ($side1 + $side2 + $side3) / 2;
        
        
        $areaSquared = $s * ($s - $side1) * ($s - $side2) * ($s - $side3);
        
        
        function squareRoot($num) {
            $x = $num;
            $y = 1;
            $e = 0.000001; // Precision level
            while ($x - $y > $e) {
                $x = ($x + $y) / 2;
                $y = $num / $x;
            }
            return $x;
        }
        
        $area = squareRoot($areaSquared);
        
        
        if ($area > 0) {
            echo "<h3>Area of the Triangle: " . number_format($area, 2) . " square units</h3>";
        } else {
            echo "<h3>Invalid triangle dimensions. Please enter valid side lengths.</h3>";
        }
    }
    ?>
</body>
</html>
