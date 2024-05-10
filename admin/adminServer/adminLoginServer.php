<?php
    include(__DIR__.'/../../function.php');
    include(__DIR__.'/../constant.php');
    
    $error = [];

    $required_fields = ['email' , 'password'];
    foreach($required_fields as $key => $value){

        if(!isset($_REQUEST[$value]) || empty($_REQUEST[$value])){

            $error[$value] = $value.' is Required';
        }
    } 
   

    if(count($error) == 0){
        $email = $_POST['email'];
        $password = $_POST['password'];   
        
        if ($email == admin_email && $password = admin_password) {
            $_SESSION['adminlogin'] = true;
            redirect($base_url.'/admin/dashboard.php');
        }
        else{
            setMessage('error' , 'No User Exist');
            redirect($base_url.'/admin/login.php');  
            
        }
        
        

        
    }
 
    if(count($error) > 0){
        setMessage('error',$error);  
        redirect($base_url.'/admin/login.php');  
    }

    exit;

?>