<?php
    include(__DIR__.'/../../function.php');    
    $error = [];

    $required_fields = ['category_name' ];
    foreach($required_fields as $key => $value){

        if(!isset($_REQUEST[$value]) || empty($_REQUEST[$value])){

            $error[$value] = $value.' is Required';
        }
    } 

    if (empty($_FILES['category_image']['name'])) {
        $str = 'Category Image is Required';
        $error['category_image'] = $str;
    }

    if(count($error) == 0){
        $catergoryName = $_POST['category_name'];     
        $image_name = $_FILES['category_image']['name'];
        $img_temp_name = $_FILES['category_image']['tmp_name'];
        $image = uploadImage($image_name, $img_temp_name);      
        
        $query = "INSERT INTO `category` (`name` , `category_image` ) VALUES ('$catergoryName' , '$image')";
        if (mysqli_query($connection, $query)) {
            setMessage('success', 'Insertion Successfully');
        } else {
            $error = 'Insertion Failed';
            setMessage('error', $error);
        }

        
    }
 
    if(count($error) > 0){
        setMessage('error',$error);  
        redirect($base_url.'/admin/add_category.php');  
    }
    
    
    redirect($base_url.'/admin/add_category.php');  

    exit;

?>