<?php
function check_mail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 1;
    } else {
        return 0;
    }
}

function send_email($from, $to, $text) {
    if (check_mail($to)) {
        $headers =  "From: $from"       . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
        $subject = 'End of subscription';
        mail($to, $subject, $text, $headers);
        return true;
    } else {
        return false;
    }
}