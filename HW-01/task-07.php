<?php
echo "<table><tr>";

for ($i = 1; $i <= 10; $i++) {

    for ($j = 1; $j <= 10; $j++) {

        if ($i % 2 == 0 && $j % 2 == 0)
            echo "<td>" . '(' . ($j * $i) . ')' . "</td>";

        elseif ($i % 2 == 1 && $j % 2 == 1)
            echo "<td>" . '[' . ($j * $i) . ']' . "</td>";

        else
            echo "<td>" . '&nbsp' . ($i * $j) . '&nbsp' . "</td>";
    }
    if ($i != 10) echo "</tr><tr>";
}

echo "</tr></table>";