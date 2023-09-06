<?php
include("db.php");
include("functions.php");

$currentDate = time();

$oneDay     = strtotime('+1 day', $currentDate);
$threeDays  = strtotime('+3 days', $currentDate);

$sql = "SELECT id, username, email FROM users WHERE validts IN ($currentDate, $oneDay, $threeDays)";
$result = $mysqli->query($sql);

$from = '';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $uId = $row['id'];
        $sqlCheckQueue = "SELECT user_id FROM email_queu WHERE user_id = $uId";
        $resultCheckQueu = $mysqli->query($sqlCheckQueue); 
        if ($resultCheckQueu->num_rows == 0) {
            $email = $row['email'];
            $sendStatus = true;
            $userId = $row['id'];
            $userName = $row['username'];
            $message = "$userName, your subscription is expiring soon";
            if ($row['confirmed'] == 1 && $row['checked'] == 1) {
                if (send_email($from, $email, $message)) {
                    $email_id = $row['id'];
                    $sqlQueu = "INSERT INTO email_queu (to_email, user_id, send) VALUES ('$email', '$userId', '1')";
                    $resultQueu = $mysqli->query($sqlQueu);
                }
            }
        }        
    }
}