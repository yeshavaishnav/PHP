<?php

function connection_open()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "cybercom";
    $conn = mysqli_connect($servername, $username, $password, $databaseName);

    if (!$conn) {
        die("connection failed");
    }
    return $conn;
}

function insertData($tableName, $values)
{
    $conn = connection_open();
    $query = "INSERT INTO " . $tableName . "(" . $values[0] . ") VALUES (" . $values[1] . ")";
    if (mysqli_query($conn, $query)) {
        return mysqli_insert_id($conn);
    } else {
        return mysqli_error($conn);
    }
}
function fetchData($tableName, $value, $args = "")
{
    $conn = connection_open();

    $sql = "select " . $value . " from " . $tableName . " " . $args;
    
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;

    } else {
        echo mysqli_error($conn);
    }
}

function joinData()
{
    $conn = connection_open();
    $sql = "SELECT C.cust_id,C.fname,C.lname,A.city, GET_IN.value AS GET_IN,HOBBY.value AS HOBBY FROM customers C
    LEFT JOIN customer_address A ON C.cust_id = A.cust_id LEFT JOIN customer_additional_info GET_IN ON C.cust_id = GET_IN.cust_id AND GET_IN.key = 'contact'
    LEFT JOIN customer_additional_info HOBBY ON C.cust_id = HOBBY.cust_id AND HOBBY.key = 'hobbies'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        return $result;
    }

}
function deleteData($cust_id)
{
    $conn = connection_open();
    $sql = "DELETE customers,customer_address,customer_additional_info FROM customers
            LEFT JOIN customer_address ON customers.cust_id = customer_address.cust_id
            LEFT JOIN customer_additional_info ON customers.cust_id = customer_additional_info.cust_id WHERE customers.cust_id = " . $cust_id;

    if (mysqli_query($conn, $sql)) {
        return true;

    } else {
        echo mysqli_error($conn);
    }
}
function fetchRow($cust_id, $tableName)
{
    $conn = connection_open();
    $sql = "select * from " . $tableName . " where cust_id = " . $cust_id;
    if ($result = mysqli_query($conn, $sql)) {
        $row = mysqli_fetch_row($result);
        return $row;
    }
}
function updateData($tableName, $data, $cust_id)
{
    $conn = connection_open();
    if ($tableName == 'customer_additional_info') {
        $flag = false;
        
        foreach ($data as $key => $value) {
            $query = "UPDATE " . $tableName . " SET `value` = " . $value . " WHERE cust_id = " . $cust_id . " and `key` = '" . $key."'";
            if (mysqli_query($conn, $query)) {
                
                $flag = true;
            }
            else
            {
                $flag = false;
            }
        }
        if($flag)
        {
            return true;
        }
        else
        {
            return mysqli_error($conn);
        }
    }
    $preparedString;
    $dataArray = array();
    foreach ($data as $key => $value) {
        array_push($dataArray, $key . "=" . $value);
    }

    $preparedString = implode(',', $dataArray);
    $query = "UPDATE " . $tableName . " SET " . $preparedString . " WHERE cust_id = " . $cust_id;
    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        return mysqli_error($conn);
    }

}
 

