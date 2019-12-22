<?php
    require_once './model/connection.php';

    $currentDate = date("Y-m-d H:i:s");

    $allTokensQuery = $mysqli->query("SELECT token, date_exp FROM password_recovery");

    while($result = $allTokensQuery->fetch_assoc())
    {
        $dateFromDB = $result['date_exp'];
        if (strtotime($currentDate) >= strtotime($dateFromDB))
        {
            $tokenFromDB = $result['token'];
            $mysqli->query("DELETE FROM password_recovery WHERE token = '$tokenFromDB'");
        }
    }
?>