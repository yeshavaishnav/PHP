<?php
function connection_open()
{
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "evaluation_test";
    $conn = mysqli_connect($server, $username, $password, $dbname);

    if (!$conn) {
        die("connection failed");
    }
    return $conn;
}

function insertData($tableName, $values)
{
    $conn = connection_open();
    $query = "SELECT * FROM " . $tableName;
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 0) {
        $sql = "ALTER TABLE " . $tableName . " AUTO_INCREMENT = 1";
        mysqli_query($conn, $sql);

    }

    $query = "INSERT INTO " . $tableName . "(" . $values[0] . ") VALUES (" . $values[1] . ")";
    if (mysqli_query($conn, $query)) {
        return mysqli_insert_id($conn);
    } else {
        return false;
    }

}
function fetchData($tableName, $value, $args = "")
{
    $conn = connection_open();

    $sql = "select " . $value . " from " . $tableName . " " . $args;

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            return $result;

        } else {
            echo mysqli_error($conn);
        }
    }
}
function deleteData($tableName, $id)
{
    $conn = connection_open();

    if ($tableName == 'post_category') {
        $sql = "DELETE FROM " . $tableName . " WHERE post_id = '" . $id . "'";
    } else {
        $sql = "DELETE FROM " . $tableName . " WHERE id = '" . $id . "'";
    }

    if (mysqli_query($conn, $sql)) {
        return true;

    } else {
        echo mysqli_error($conn);
    }
}
function updateData($tableName, $data, $user_id)
{
    $conn = connection_open();
    $preparedString;
    $dataArray = array();
    foreach ($data as $key => $value) {
        array_push($dataArray, $key . "=" . $value);
    }
    
    $preparedString = implode(',', $dataArray);
    
    if ($tableName == 'user') {
        $query = "UPDATE " . $tableName . " SET " . $preparedString . " WHERE user_id = " . $user_id;
    } else {
        $query = "UPDATE " . $tableName . " SET " . $preparedString . " WHERE id = " . $user_id;
    }
    
    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        return mysqli_error($conn);
    }
}
