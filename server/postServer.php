<?php
include(__DIR__ . '/../function.php');
$url = '/post_listing.php';
$error = [];
$required_fields = ['title', 'des', 'category'];

foreach ($required_fields as $key => $value) {

    if (!isset($_REQUEST[$value]) || empty($_REQUEST[$value])) {
        $error[$value] = $value . ' is Required';
    }
}

if (empty($_FILES['image']['name'])) {
    $str = 'Image is Required';
    $error['image'] = $str;
}
if (empty($_FILES['video']['name'])) {
    $str = 'video is Required';
    $error['video'] = $str;
}
$tags = [];
if (isset($_POST['tags'])) {
    $tags = $_POST['tags'];
}


if (count($error) == 0) {
    $author_id = $_SESSION['loggedInUserId'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $des = $_POST['des'];
    $serialize_tags = serialize($tags);

    $image_name = $_FILES['image']['name'];
    $img_temp_name = $_FILES['image']['tmp_name'];
    $image = uploadImage($image_name, $img_temp_name);

    $video_name = $_FILES['video']['name'];
    $vid_temp_name = $_FILES['video']['tmp_name'];
    $video = uploadVideo($video_name , $vid_temp_name);

    $query = "INSERT INTO `post` ( `title`, `des`,`image` ,`video`,`tags`,`category`,`auther_id` ) VALUES ( '$title', '$des', '$image', '$video','$serialize_tags','$category','$author_id' )";
    if (mysqli_query($connection, $query)) {
        setMessage('success', 'Insertion Successfully');
    } else {
        $error = 'Insertion Failed';
        setMessage('error', $error);
    }
}

if (count($error) > 0) {
    setMessage('error', $error);
    $url = '/add_post.php';
}
redirect($base_url . $url);

exit;
?>