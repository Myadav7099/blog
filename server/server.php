<?php
    include(__DIR__.'/../function.php');
    $error = [];
    $required_fields = ['email','password' , 'firstname', 'lastname','phone' ,'address'];

    foreach($required_fields as $key => $value){

        if(!isset($_REQUEST[$value]) || empty($_REQUEST[$value])){

            $error[$value] = $value.' is Required';
        }
    }
    
    if (empty($_FILES['image']['name'])) {
        $str = 'Image is Required';
        $error['image'] = $str;
    }

    if(!empty($_POST['phone'])){
        $phone = $_POST['phone'];
        if (!(is_numeric($phone) && strlen($phone) == 10)) {
            $error['phone'] = 'Phone number length must be 10 digit';           
        }
    }

    if(count($error) == 0){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $image_name = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];
        $unique_name = uploadImage($image_name ,$temp_name);     
            $query = "INSERT INTO `users` ( `email`, `password`, `phone`, `first_name`, `last_name`, `address` ,`unique_name`) VALUES ( '$email', '$password', '$phone', '$firstname', '$lastname', '$address' ,'$unique_name')";
            if(mysqli_query($connection, $query)){
                setMessage('success' , 'Insertion Successfully');   
            }
            else{
                $error = 'Insertion Failed';
                setMessage('error' , $error);               
            }            
    }

    if(count($error) > 0){
        setMessage('error' , $error);      
    }
    redirect($base_url.'/index.php');
   
    exit; 
?>