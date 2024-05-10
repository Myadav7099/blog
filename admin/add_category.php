<?php
    include(__DIR__.'/partials/nav.php');
    include_once(__DIR__.'/../function.php');

    $success = getMessage('success',true);
    $error = getMessage('error',true);


?>

<?php if($success){ ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?php echo $success; ?></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
    </div>
<?php } ?>
<?php if(!(is_array($error))){ 
        if(isset($error)){ ?>
            <div class="alert alert-danger">
                <p><?php echo $error; ?></p>
            </div> 
        <?php } } ?>



<div class="container my-4" style="width: 800px;">
    <h2>Add Category :</h2>
    <div class="border border-primary rounded"></div>
    <form action="./adminServer/categoryServer.php"  method="POST"  enctype = "multipart/form-data">
        
    <div class="form-group">   
        <div class="form-row">
            <div class="form-group col-md-12">
                <label class="my-2" for="category_name ">Category Name</label>
                <input type="text" class="form-control my-2" id="category_name" name = "category_name" placeholder = "Enter Category">
                <?php if(isset($error['category_name'])) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?php echo $error['category_name']; ?></strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php } ?>
            </div>
            <div class="form-group col-md-12">
                <label class="my-2" for="category_image">Category Image</label>
                <input type="file" class="form-control my-2" id="category_image" placeholder="Insert Category Image" name="category_image" >
                <?php if(isset($error['category_image'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?php echo $error['category_image']; ?></strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                 </div>
                <?php } ?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Confirm</button>

        
    </div>
    </form>

</div>