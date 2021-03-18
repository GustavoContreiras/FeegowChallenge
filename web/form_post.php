<?php

include('constants.php');

$specialty_id = $_POST["specialty_id"];
$professional_id = $_POST["professional_id"];
$source_id = $_POST["source_id"];
$name = $_POST["name"];
$cpf = $_POST["cpf"];
$birth = $_POST['birth'];
$now = date("Y-m-d H:i:s");

// CONNECT
try {

    $servername = App\Constants::SERVERNAME;
    $username =  App\Constants::USERNAME;
    $password =  App\Constants::PASSWORD;
    $dbname =  App\Constants::DBNAME;

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) { echo json_encode("Error on connect: " . $e->getMessage()); }

// EXECUTE INSERT
try {
    $stmt = $conn->prepare("INSERT INTO feegow.schedules (specialty_id, professional_id, source_id, name, cpf, birth_date, datetime) VALUES (?, ?, ?, ?, ?, ?, ?);");
    $stmt->execute(array($specialty_id, $professional_id, $source_id, $name, $cpf, $birth, $now));
} catch (Exception $e) { echo json_encode("Error on execute insert statement: " . $e->getMessage()); }

// EXECUTE SELECT
try {
    $stmt = $conn->prepare("SELECT id, datetime FROM feegow.schedules WHERE datetime='$now' LIMIT 1;");
    $stmt->execute();
} catch (Exception $e) { echo json_encode("Error on execute select statement: " . $e->getMessage()); }
    
// FETCH SELECT RESULT
try {
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $array = $stmt->fetchAll();
    foreach ($array as $elem) {
        echo json_encode($elem);
    }
} catch (Exception $e) { echo json_encode("Error on execute fetch: " . $e->getMessage()); }

$conn = null;
