<?php
    $servername='isp.kashmirbroadband.net';
	$uname='infooid_isp';
	$pwd='12345678';
	$myDB="infooid_isp";
	try {
    $conn = new PDO("mysql:host=isp.kashmirbroadband.net;dbname=infooid_isp", $uname, $pwd);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
	}catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>