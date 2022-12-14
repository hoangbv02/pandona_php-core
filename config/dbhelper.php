<?php
function connect()
{
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'banhangtrangsucpandonadb';
    $conn = new mysqli($host, $user, $password, $dbname);
    return $conn;
}
function executeResult($sql)
{
    $conn = connect();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result = $conn->query($sql);
    return $result;
    $conn->close();
}

function executeList($sql)
{
    $conn = connect();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result = $conn->query($sql);
    $list = [];
    while ($row = $result->fetch_assoc()) {
        $list[] = $row;
    }

    return $list;
    $conn->close();
}
