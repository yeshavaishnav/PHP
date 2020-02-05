<?php
require_once 'database.php';
session_start();
function getPostData($section)
{
    $attributes = array('user' => array('prefix', 'firstname', 'lastname', 'email', 'mobile', 'password', 'lastLoginAt', 'information', 'createdAt', 'updatedAt'),
    'category' => array('ctitle', 'ccontent', 'curl', 'metatitle', 'parent_category_id', 'cimage', 'createdAt', 'updatedAt'),
    'blog_post' => array('user_id', 'btitle', 'bcontent', 'burl', 'publishedAt', 'bcategory', 'bimage', 'createdAt', 'updatedAt'),
    );
    $data = array();

    foreach ($attributes[$section] as $value) {
        
        if ($value == 'parent_category_id') {
            $data[$value] = "'" . $_SESSION['parent'] . "'";
        }
        if ($value == 'user_id') {
            $data[$value] = "'" . $_SESSION['user_id'] . "'";
        }
        if($value == 'parent')
        {
            $value = $_SESSION['parent'];
        }
        if ($value == 'bcategory' && is_array($_POST[$value])) {
            $data[$value] = "'" . implode(',', $_POST[$value]) . "'";
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
        $loginTime = date('d:m:Y H:i:s',time());
        $data = array('lastLoginAt'=>"'".$loginTime."'");
        updateData('user',$data,$_SESSION['user_id']);
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
           
        if ( $_SESSION['user_id'] = insertData('user', prepareData(getPostData('user')))) {
            $createTime = date('d:m:Y H:i:s',time());
            $data = array('createdAt'=>"'".$createTime."'");
            updateData('user',$data,$_SESSION['user_id']);
            header('Location: blog-post.php');
        }

    } else {
        echo "Please accept terms and conditions";
    }
}
if (isset($_POST['addcategory'])) {

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

if (isset($_POST['profile'])) {
    header('Location: profile.php');
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location:login.php');
}
if (isset($_POST['addblogpost'])) {
    $_SESSION['post_id'] = insertData('blog_post', prepareData(getPostData('blog_post')));

    $result = fetchData('blog_post', 'bcategory', 'where id = ' . $_SESSION['post_id']);
    $row = mysqli_fetch_row($result);
    $selectedCategory = $row[0];

    if (strpos($selectedCategory, ',')) {
        $selectedCategory = explode(',', $selectedCategory);

        foreach ($selectedCategory as $item) {
            $result = fetchData('category', 'id', "where ctitle = '" . $item . "'");
            $row = mysqli_fetch_row($result);

            $data = implode(',', array($_SESSION['post_id'], $row[0]));
            $dataArray = array('post_id,category_id', $data);
            insertData('post_category', $dataArray);
        }

    } else {
        $result = fetchData('category', 'id', "where ctitle = '" . $selectedCategory . "'");
        $row = mysqli_fetch_row($result);

        $data = implode(',', array($_SESSION['post_id'], $row[0]));
        $dataArray = array('post_id,category_id', $data);
        insertData('post_category', $dataArray);
    }
    $createTime = date('d:m:Y H:i:s',time());
            $data = array('createdAt'=>"'".$createTime."'");
            updateData('blog_post',$data,$_SESSION['post_id']);
    header('Location:blog-post.php');
}
if (isset($_POST['editblogpost'])) {
    echo updateData('blog_post', getPostData('blog_post'), $_SESSION['editpost_id']);
    
    header('Location:blog-post.php');
}
if (isset($_POST['parent'])) {
    $_SESSION['parent'] = $_POST['parent'];
}
if (isset($_POST['editcategory'])) {
    if (updateData('category', getPostData('category'), $_SESSION['editcategory_id'])) {
        header('Location:blog-category.php');
    }
}
if (isset($_POST['update'])) {

    if (updateData('user', getPostData('user'), $_SESSION['user_id'])) {
        $updateTime = date('d:m:Y H:i:s',time());
        $data = array('updatedAt'=>"'".$updateTime."'");
        updateData('user',$data,$_SESSION['user_id']);
        header('Location:blog-post.php');
    }
}
