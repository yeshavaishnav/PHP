<?php

require_once 'database.php';
session_start();
function getPostData($section)
{
    $attributes = array('user' => array('prefix', 'firstname', 'lastname', 'email', 'mobile', 'password', 'lastLoginAt', 'information', 'createdAt', 'updatedAt'),
        'category' => array( 'ctitle', 'ccontent', 'curl', 'metatitle', 'parent_category_id', 'cimage', 'createdAt', 'updatedAt'),
        'blog_post' => array( 'btitle', 'bcontent', 'burl', 'publishedAt', 'bcategory', 'bimage', 'createdAt', 'updatedAt'),
    );
    $data = array();

    foreach ($attributes[$section] as $value) {
        if ($value == 'lastLoginAt' || $value == 'createdAt' || $value == 'updatedAt') {
            $data[$value] = "' '";
        }
        
        if ($value == 'parent_category_id') {
            $data[$value] = "'" . $_SESSION['category_id'] . " '";
        } else {
            if (isset($_POST[$value])) {
                $data[$value] = "'" . $_POST[$value] . "'";
            }
        }
    }

    return $data;
}
function prepareData($data)
{
    $time_now = date('d:m:Y H:i:s', time());
    $data['createdAt'] = "'" . $time_now . "'";
    $key = implode(',', array_keys($data));
    $value = implode(',', array_values($data));
    $dataArray = array($key, $value);
    return $dataArray;
}
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dbpassword;
    $result = fetchData('user', '*', "where email = '" . $email . "'");
    $row = mysqli_fetch_row($result);
    $dbpassword = $row[6];
    $_SESSION['user_id'] = $row[0];
    if ($password == $dbpassword) {
        header('Location: blog-post.php');
    } else {
        echo "Incorrect Password";
    }

}

if (isset($_POST['reg'])) {
    header('Location: register.php');
}
if (isset($_POST['register'])) {
    if (isset($_POST['tandc'])) {

        $user_id = insertData('user', prepareData(getPostData('user')));

        $_SESSION['user_id'] = $user_id;
        if (insertData('user', prepareData(getPostData('user')))) {
            header('Location: blog-post.php');
        }

    } else {
        echo "Please accept terms and conditions";
    }

}
if (isset($_POST['addcategory'])) {
    $_SESSION['category_id'] = insertData('category', prepareData(getPostData('category')));
    if (insertData('category', prepareData(getPostData('category')))) {
        header('Location: blog-category.php');
    }

}
if (isset($_POST['add'])) {
    header('Location: add-category.php');
}
if (isset($_POST['manage'])) {
    header('Location: blog-category.php');
}
if (isset($_POST['addblog'])) {
    header('Location:add-blog-post.php');
}
if (isset($_POST['addblogpost'])) {
    
    if((insertData('blog_post', prepareData(getPostData('blog_post')))))
    {
        header('Location:blog-post.php');
    }
      
}
if (isset($_POST['profile'])) {
    header('Location: profile.php');
}
if (isset($_POST['edit'])) {
    header('Location: blog-post.php');
}
if(isset($_POST['update']))
{
    updateData('user',prepareData(getPostData('user')),$_SESSION['user_id']);
}
if(isset($_POST['logout']))
{
    session_destroy();
    header('Location: login.php');
}


