<!DOCTYPE html>
<html>
<head>
    <title>Array of Even Numbers</title>
</head>
<body>
    <h2>Even Numbers in the Matrix</h2>
    <ul>
        <?php
        
        $matrix = [
            [12, 23, 34],
            [45, 55, 62],
            [71, 84, 90],
        ];
        
        $i = 0;
        while ($i < count($matrix)) {
            $j = 0;
            while ($j < count($matrix[$i])) {
                if ($matrix[$i][$j] % 2 == 0) {
                    echo "<li>" . $matrix[$i][$j] . "</li>";
                }
                $j++;
            }
            $i++;
        }
        ?>
    </ul>
</body>
</html>