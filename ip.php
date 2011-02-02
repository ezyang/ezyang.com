<?php

$ip = trim(file_get_contents('ip.txt'));

if (isset($_GET['record'])) {
    $new_ip = $_SERVER['REMOTE_ADDR'];
    if ($new_ip !== $ip) {
        mail(
            'Edward Z. Yang <edwardzyang@thewritingpot.com>',
            "IP change notification ($new_ip)",
            "This is an automated notification indicating that your IP address\r\n".
            "has changed from $ip to $new_ip."
        );
        file_put_contents('ip.txt', $new_ip);
        $ip = $new_ip;
    }
    file_put_contents('ip-updated.txt', time());
}

echo $ip . ' last updated ' . date('r', file_get_contents('ip-updated.txt'));
