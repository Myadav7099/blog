<?php
    include(__DIR__.'/../function.php');

    $error = [];
    $table = 'users';
    $url = 'http://localhost:81/app_blog/login.php';

    $required_fields = ['email' , 'password'];
    foreach($required_fields as $key => $value){

        if(!isset($_REQUEST[$value]) || empty($_REQUEST[$value])){

            $error[$value] = $value.' is Required';
        }
    } 
   

    if(count($error) == 0){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT *  FROM $table WHERE `email` = '$email' AND `password` = '$password' "; 
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) > 0 ) {

            $data = mysqli_fetch_assoc($result);
            $_SESSION['loggedInUserId'] = $data['id'];
            setMessage('success' , 'LoggedIn Successfully');
            
            $url = 'http://localhost:81/app_blog/home.php';
            
        }
        else{             
            
            setMessage('error' , 'No User Exist');
            $url = 'http://localhost:81/app_blog/login.php';
            
        }       
    }
 
    if(count($error) > 0){
        setMessage('error',$error);  
        $url = 'http://localhost:81/app_blog/login.php';    
    }

    header('location:'.$url);
    exit; 
?>