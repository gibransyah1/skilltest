<?php

// Nama: Gibransyah
// Looping dengan Logic
echo "<h1>SOAL 1</h1>";
$mulai = 1;
$start = 5;
while ($mulai <= $start) {
    for ($i = 1; $i <= 8; $i++) {
        if ($mulai == 1 && $i == 2) {
            echo '*';
        } else if ($mulai == 1 && $i == 3) {
            echo '*';
        } else if ($mulai == 2 && $i == 3) {
            echo '*';
        } else if ($mulai == 2 && $i == 4) {
            echo '*';
        } else if ($mulai == 3 && $i == 4) {
            echo '*';
        } else if ($mulai == 3 && $i == 5) {
            echo '*';
        } else if ($mulai == 4 && $i == 5) {
            echo '*';
        } else if ($mulai == 4 && $i == 6) {
            echo '*';
        } else if ($mulai == 5 && $i == 6) {
            echo '*';
        } else if ($mulai == 5 && $i == 7) {
            echo '*';
        } else {
            echo $i;
        }
    }
    echo "<br>";
    $mulai++;
}
