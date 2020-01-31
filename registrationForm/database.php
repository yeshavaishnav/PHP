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

    if ($tableName == 'customers') {
        echo "<table border='1'><tr><th>ID</th><th>Prefix</th><th>Firstname</th><th>Lastname</th><th>DateofBirth</th><th>Phone</th><th>Email</th><th>Password</th></tr>";
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row['cust_id'] . "</td><td>" . $row['prefix'] . "</td><td>" . $row['fname'] . "</td><td>" . $row['lname'] . "</td><td>" . $row['dob'] . "</td><td>" . $row['phone'] . "</td><td>" . $row['email'] . "</td><td>" . $row['password'] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo mysqli_error($conn);
        }
    } else if ($tableName == 'customer_address') {
        echo "<table border='1'><tr><th>ID</th><th>Address 1</th><th>Address 2</th><th>Company</th><th>City</th><th>State</th><th>Country</th><th>Postal Code</th></tr>";
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row['addr_id'] . "</td><td>" . $row['addr1'] . "</td><td>" . $row['addr2'] . "</td><td>" . $row['company'] . "</td><td>" . $row['city'] . "</td><td>" . $row['state'] . "</td><td>" . $row['country'] . "</td><td>" . $row['postalCode'] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo mysqli_error($conn);
        }
    } else if ($tableName == 'customer_additional_info') {
        echo "<table border='1'><tr><th>ID</th><th>Key</th><th>Value</th></tr>";
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row['cust_id'] . "</td><td>" . $row['key'] . "</td><td>" . $row['value'] . "</tr>";
            }
            echo "</table>";
        } else {
            echo mysqli_error($conn);
        }
    }
}

function joinData()
{
    $conn = connection_open();
    $sql = "select C.cust_id,C.fname,C.lname,A.city, GET_IN.value AS GET_IN,HOBBY.value AS HOBBY from customers C
    LEFT JOIN customer_address A ON C.cust_id = A.cust_id
    LEFT JOIN customer_additional_info GET_IN ON C.cust_id = GET_IN.cust_id AND GET_IN.key = 'contact'
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
            INNER JOIN customer_address ON customers.cust_id = customer_address.cust_id 
            INNER JOIN customer_additional_info ON customers.cust_id = customer_additional_info.cust_id WHERE customers.cust_id = ".$cust_id;

        if(mysqli_query($conn,$sql))
        {
           echo "record deleted successfully";
           
            
        }
        else
        {
            echo mysqli_error($conn);
        }
}
function fetchRow($cust_id)
{
    $conn = connection_open();
    $sql = "select * from customers C LEFT JOIN customer_address A ON C.cust_id = A.cust_id
    LEFT JOIN customer_additional_info GET_IN ON C.cust_id = GET_IN.cust_id where C.cust_id = ".$cust_id;
    if($result = mysqli_query($conn,$sql))
    {
        return $result;
   }
}
