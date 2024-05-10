<?php
session_start();
include(__DIR__ . '/connection.php');

$base_url = 'http://localhost:81/app_blog';

function getPopulerPost($limit = 8){
    global $connection;
    $query = "SELECT * FROM `post` ORDER BY `view` DESC LIMIT $limit " ;
    $result = mysqli_query($connection , $query);
    $output = [];

    while($row = mysqli_fetch_assoc($result)){
        $output[]=$row;
    }
    return $output;

}

function getRecentPost($limit = 8){
    global $connection;
    $query = "SELECT * FROM `post` ORDER BY `creation_time` DESC LIMIT $limit " ;
    $result = mysqli_query($connection , $query);
    $output = [];

    while($row = mysqli_fetch_assoc($result)){
        $output[]=$row;
    }
    return $output;

}


function incrementPostView($post_id){

    global $connection;
    $view = getPostView($post_id); $view += 1;
    $query = "UPDATE `post` SET `view` = '$view' WHERE `id` = $post_id ";
    mysqli_query($connection , $query);
    
}

function getPostView($post_id){
    global $connection;
    $query = "SELECT view FROM `post` where id = $post_id ";
    $result = mysqli_query($connection , $query);
    $row = mysqli_fetch_assoc($result);
    return $row['view'];

}

// show post according to the search keyword
function getSearchPost($keyword = null)
{
    global $connection;
    $query = "SELECT * FROM `post` WHERE title LIKE $keyword OR des LIKE $keyword ";
    $result = mysqli_query($connection, $query);
    $output = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }
    return $output; 
}


function getTotalPost($keyword = null)
{
    global $connection;

    if (isset($keyword)) {
        
        $query = "SELECT post.* FROM `users` INNER JOIN `post` ON users.id = post.auther_id  WHERE title LIKE '%$keyword%' OR des LIKE '%$keyword%' ";
        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);
        
    }
    else {

        $query = "SELECT post.* FROM `users` INNER JOIN `post` ON users.id = post.auther_id  ";
        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);
        
    }
    return $count;
    
}





function getCategoryName()
{
    global $connection;
    $query = "SELECT category.name  , category.id FROM `category`";
    $result = mysqli_query($connection, $query);
    $output = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }
    return $output;
}

function getTotalCategory()
{
    global $connection;
    $query = "SELECT * FROM `category` ";
    $result = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    return $count;
}

function getCategoryData($limit, $offset)
{
    global $connection;
    $query = "SELECT * FROM `category` LIMIT $limit OFFSET $offset";

    $result = mysqli_query($connection, $query);
    $output = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }
    return $output;
}

function deleteComment($comment_id)
{
    global $connection;
    $query = " DELETE FROM comments WHERE id = $comment_id ";
    mysqli_query($connection, $query);
}

function isAuther($auther_id)
{
    $login_user = $_SESSION['loggedInUserId'];
    if ($auther_id == $login_user) {
        return true;
    } else {
        return false;
    }
}

function getPostComment($post_id =  null)
{

    global $connection;
    $output = [];
    if ($post_id) {
        $query = " SELECT comments.* , users.first_name AS name , users.unique_name AS image FROM `comments` INNER JOIN `users` ON users.id = comments.admin_id WHERE comments.post_id = $post_id  ";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $output[] = $row;
        }
    }


    return $output;
}

// function getBlogInfo($post_id)
// {
//     // give information about a perticular blog 
//     global $connection;
//     $query = " SELECT * FROM `post` WHERE id = $post_id ";
//     $result = mysqli_query($connection, $query);
//     $row = mysqli_fetch_assoc($result);
//     return $row;
// }

function getPostInfo($post_id)
{
    // give information about the full post including the user data who create a post 
    global $connection;
    // $id = $_SESSION['loggedInUserId'];
    $query = " SELECT post.*, users.*  FROM `users` INNER JOIN `post` ON users.id = post.auther_id WHERE  post.id = $post_id ";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

// function getBolglist()
// {
//     //return all blogs by a single user
//     global $connection;
//     $id = $_SESSION['loggedInUserId'];
//     $query = "SELECT post.* FROM `users` INNER JOIN `post` ON users.id = post.auther_id WHERE users.id = $id ";

//     $result = mysqli_query($connection, $query);
//     $output = [];
//     while ($row = mysqli_fetch_assoc($result)) {
//         $output[] = $row;
//     }
//     return $output;
// }

function getBolgPages($limit, $offset , $keyword = null)
{
    // return blogs list according to pagination as per limit 
    global $connection;

    if ($keyword) {
        $query = "SELECT post.* FROM `users` INNER JOIN `post` ON users.id = post.auther_id WHERE title LIKE '%$keyword%' OR des LIKE '%$keyword%' LIMIT $limit OFFSET $offset ";
        $result = mysqli_query($connection, $query);
        $output = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $output[] = $row;
        }
        
    }
    else{
        $query = "SELECT post.* FROM `users` INNER JOIN `post` ON users.id = post.auther_id  LIMIT $limit OFFSET $offset";
        $result = mysqli_query($connection, $query);
        $output = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $output[] = $row;
        }

    }

    // $id = $_SESSION['loggedInUserId'];
    return $output;
}


function redirect($url = false)
{
    if ($url) {
        header('location:' . $url);
    }
    exit;
}


function uploadImage($image_name, $temp_name)
{
    $image_info = pathinfo($image_name);
    $image_extension = $image_info['extension'];
    $image_name = 'image-' . time() . '.' . $image_extension;
    $upload_directory = __DIR__ . '/uploads/' . $image_name;
    $is_upload = move_uploaded_file($temp_name, $upload_directory);

    return $image_name;
}

function uploadVideo($video_name, $temp_name)
{
    $video_info = pathinfo($video_name);
    $video_extension = $video_info['extension'];
    $video_name = 'video-' . time() . '.' . $video_extension;
    $upload_directory = __DIR__ . '/uploads/' . $video_name;
    // echo $upload_directory;die;
    $is_upload = move_uploaded_file($temp_name, $upload_directory);

    return $video_name;
}

function logout()
{
    global $base_url;
    session_start();
    session_destroy();
    redirect($base_url);
}

function loggedInUserDetail()
{
    global $connection;
    $id = $_SESSION['loggedInUserId']??null;
    $table = 'users';
    if($id){

        $query = "SELECT *  FROM $table WHERE `id` = $id ";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        return $row;

    }
    return false;
}

function isAuthenticate()
{
    global $base_url;
    if (!isset($_SESSION['loggedInUserId'])  ) {
        redirect($base_url . '/login.php');
    }
}

function isLogin()
{
    global $base_url;
    if (isset($_SESSION['loggedInUserId'])) {
        redirect($base_url . '/home.php');
    }
}

function setMessage($key = false, $value = false)
{
    if ($key && $value) {
        $_SESSION[$key] = $value;
    }
}

function getMessage($key = false, $flash = false)
{
    if ($key && isset($_SESSION[$key])) {
        $message = $_SESSION[$key];
        if ($flash) {
            unset($_SESSION[$key]);
        }
        return $message;
    }
}


// function getTotalPost()
// {
//     global $connection;
//     $id = $_SESSION['loggedInUserId'];
//     $query = "SELECT post.* FROM `users` INNER JOIN `post` ON users.id = post.auther_id ";
//     $result = mysqli_query($connection, $query);
//     $count = mysqli_num_rows($result);
//     return $count;
// }