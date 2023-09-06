<?php
include('db.php'); 

for ($i = 1; $i <= 5000010; $i++) {
    $email = "user$i@test.tt";
    $username = "user$i";
    $randValidtsDate = rand(1, 10);
    $validts = rand(time(), strtotime("+$randValidtsDate day")); 
    $confirmed = rand(0, 1);
    $checked = rand(0, 1);
    $valid = rand(0, 1);

    $sql = "INSERT INTO users (email, username, validts, confirmed, checked, valid) VALUES ('$email', '$username', $validts, $confirmed, $checked, $valid)";
    $result = $mysqli->query($sql);

    if (!$result) {
        echo "Error: " . $mysqli->error;
        break; 
    }
}
