<?php
    include(__DIR__.'/../function.php');
    

    if (isset($_POST['post_id'])) {
        $post_id = $_POST['post_id'];
    }

    // $comment = $_POST['comment'];
    // echo $comment;die;

    $error = [];
    $required_fields = ['comment'];
    foreach($required_fields as $key => $value){

        if(!isset($_REQUEST[$value]) || empty($_REQUEST[$value])){

            $error[$value] = $value.' is Required';
        }
    } 

    if(count($error) == 0){
        $comment = $_POST['comment'];
        $admin_id = $_SESSION['loggedInUserId'];
        $query = "INSERT INTO `comments` (`post_id`,`admin_id`,`comment`) VALUES ($post_id , $admin_id , '$comment')";

        if(mysqli_query($connection , $query)){
            setMessage('success' , 'Insertion Successful');
        }else{
            setMessage('error' , 'Insertion Failed');
        }

    }

    if(count($error) > 0){        
        setMessage('error' , $error);  
    }
    redirect($base_url.'/blog_info.php?id='.$post_id);


?>