<?php
include_once 'database.php';
session_start();
function getValue($fieldName, $returntype = "")
{
    return isset($_POST[$fieldName]) ? $_POST[$fieldName] : $returntype;
}

function setValueToSession($section, $fieldName)
{
    $_SESSION[$section][$fieldName] = isset($_POST[$fieldName]) ? $_POST[$fieldName] : "";
}
$attributes = array('account' => array('prefix', 'fname', 'lname', 'dob', 'phone', 'email', 'password'),
    'address' => array('addr1', 'addr2', 'company', 'city', 'state', 'country', 'postalCode'),
    'other' => array('description', 'profile', 'certificate', 'business', 'client', 'contact', 'hobbies'));

if (isset($_POST['submit'])) {
    foreach ($attributes as $key => $value) {
        foreach ($value as $item) {
            $result = validate($item);
            if ($result == "") {
                setValueToSession($key, $item);
            }
        }
    }
    $account_id = insertData('customers', prepareData('account'));
    $address_id = insertData('customer_address', prepareData('address', $account_id));
    $other_id = insertOtherData($account_id);
    header('Location:display.php');
}

if (isset($_POST['update'])) {
    $account = getData('account');
    $address = getData('address');
    $other = getData('other');

    if (updateData('customers', $account, $_SESSION['last_id']) && updateData('customer_address', $address, $_SESSION['last_id']) && updateData('customer_additional_info', $other, $_SESSION['last_id'])) {
        header('Location:display.php');
    }

}

function insertOtherData($cust_id)
{
    $otherData = getData('other');
    $column = "`cust_id`,`key`,`value`";
    foreach ($otherData as $key => $value) {
        $data = "'" . $cust_id . "','" . $key . "'," . $value;
        $otherArray = array($column, $data);
        $other_id = insertData('customer_additional_info', $otherArray);
    }
    return $other_id;
}
function prepareData($section, $cust_id = "")
{
    $data = getData($section);
    if ($cust_id != "") {
        $data['cust_id'] = $cust_id;
    }
    $value = implode(',', array_values($data));
    $key = implode(',', array_keys($data));
    $data = array($key, $value);
    return $data;
}

function getData($section)
{
    $attributes = array('account' => array('prefix', 'fname', 'lname', 'dob', 'phone', 'email', 'password'),
        'address' => array('addr1', 'addr2', 'company', 'city', 'state', 'country', 'postalCode'),
        'other' => array('description', 'profile', 'certificate', 'business', 'client', 'contact', 'hobbies'));
    $accountData = array();
    $addressData = array();
    $otherData = array();
    $sectionData = array('account' => array(),
        'address' => array(),
        'other' => array());
    foreach ($attributes[$section] as $value) {

        foreach ($sectionData as $key => $item) {
            $val = $_POST[$value];
            if (is_array($_POST[$value])) {
                $val = implode(',', $val);
            }
            $sectionData[$section][$value] = "'" . $val . "'";
        }
    }
    return $sectionData[$section];
}
function validate($fieldName)
{
    switch ($fieldName) {
        case 'fname':if (!isset($_POST[$fieldName])) {
                $fnameError = "Enter first name";
                return $fnameError;
            }
            break;
        case 'lname':if (!isset($_POST[$fieldName])) {
                $lnameError = "Enter last name";
                return $lnameError;
            }
            break;
        case 'cpassword':if (isset($_POST['password']) && isset($_POST[$fieldName])) {
                if ($_POST['password'] != $_POST[$fieldName]) {
                    $cpasswordError = "Password and confirm password should be same";
                    return $cpasswordError;
                }
            }
        case 'phone':if (!isset($_POST[$fieldName])) {
                $phoneError = "Enter phone number";
                return $phoneError;
            }
            break;
        case 'email':if (!isset($_POST[$fieldName])) {
                $emailError = "Enter email";
                return $emailError;
            }
            break;

        case 'addr1':if (!isset($_POST[$fieldName])) {
                $addr1Error = "Enter address";
                return $addr1Error;
            }
            break;
        case 'addr2':if (!isset($_POST[$fieldName])) {
                $addr2Error = "Enter address";
                return $addr2Error;
            }
            break;
        case 'postalCode':if (!isset($_POST[$fieldName])) {
                $postalError = "Enter postal code";
                return $postalError;
            }
            break;
        case 'description':if (!isset($_POST[$fieldName])) {
                $descriptionError = "Enter your description";
                return $descriptionError;
            }
            break;
        case 'contact':if (!isset($_POST[$fieldName])) {
                $contactError = "Enter contact method";
                return $contactError;
            }
            break;
        default:return "";
    }
}
