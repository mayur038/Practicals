<?php
function printPattern($rows) {
    $num = 1;
    $char = 'a';

    for ($i = 1; $i <= $rows; $i++) {
        // Print numbers or letters
        for ($j = 1; $j <= $i; $j++) {
            if ($i % 2 == 0) {
                echo $char . " ";
                $char++;
            } else {
                echo $num . " ";
                $num++;
            }
        }
        echo "<br>";
    }
}

// Define the number of rows for the pattern
$rows = 5;
echo "<h1>Pattern 1</h1>";

printPattern($rows);
?>




<?php
function printPatternss($rows) {
    for ($i = 1; $i <= $rows; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            // Determine whether to print 0 or 1 based on the row and column index
            if (($i + $j) % 2 == 0) {
                echo "1 ";
            } else {
                echo "0 ";
            }
        }
        echo "<br>";
    }
}

// Define the number of rows for the pattern
$rows = 5;

// Print the pattern
echo "<h1>Pattern 2</h1>";
printPatternss($rows);
?>
