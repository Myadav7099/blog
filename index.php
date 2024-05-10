<?php
    include(__DIR__.'/partials/head.php');
    include(__DIR__.'/function.php');
    isLogin();
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



<div class="container my-4">
    <h2>Register Yourself :</h2>
    <div class="border border-primary rounded"></div>
    <form action="./server/server.php"  method="POST"  enctype = "multipart/form-data">
    <div class="form-group">   
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="name" name = "firstname" placeholder = "Enter First Name">
                <?php if(isset($error['firstname'])) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?php echo $error['firstname']; ?></strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php } ?>
            </div>
            <div class="form-group col-md-6">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="name" name = "lastname" placeholder = "Enter Last Name">
                <?php if(isset($error['lastname'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?php echo $error['lastname']; ?></strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                 </div>
                <?php } ?>
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name = "email" placeholder = "Enter E-mail">
                <?php if(isset($error['email'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?php echo $error['email']; ?></strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                 </div>
                <?php } ?>
            </div>
            <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name = "password" placeholder = "Enter Password">
                <?php if(isset($error['password'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?php echo $error['password']; ?></strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                 </div>
                <?php } ?>
            </div>
            <div class="form-group col-md-6">
                <label for="phone">Phone No.</label>
                <input type="tel" class="form-control" id="phone" name = "phone" placeholder="Enter your Phone Number">
                <?php if(isset($error['phone'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?php echo $error['phone']; ?></strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                 </div>
                <?php } ?>
            </div>
            <div class="form-group col-md-6">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name = "address" placeholder="Enter your address">
                <?php if(isset($error['address'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?php echo $error['address']; ?></strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                 </div>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" placeholder="Insert Image" name="image" >
                <?php if(isset($error['image'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?php echo $error['image']; ?></strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                 </div>
                <?php } ?>
            </div>
        </div> 
        <button type="submit" class="btn btn-primary">Register</button>

        <a type="button" class="btn btn-primary" href="login.php">
           Log In
        </a>
    </div>
    </form>

</div>