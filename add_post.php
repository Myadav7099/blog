<?php
include(__DIR__ . '/function.php');
include(__DIR__ . '/partials/head.php');
include(__DIR__ . '/partials/header.php');
isAuthenticate();
$success = getMessage('success', true);
$error = getMessage('error', true);
$data = getCategoryName();


?>

<head></head>

<body>

    <?php if ($success) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $success; ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <?php if (!(is_array($error))) {
        if (isset($error)) { ?>
            <div class="alert alert-danger">
                <p><?php echo $error; ?></p>
            </div>
    <?php }
    } ?>



    <div class="container my-5 ">
        <h2>Add Post :</h2>
        <div class="border border-primary rounded"></div>
        <form action="./server/postServer.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <div class="form-row p-4">

                    <div class="form-group col-md-6">
                        <label for="title"> <strong>Title:</strong></label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Your Title">
                        <?php if (isset($error['title'])) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><?php echo $error['title']; ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="category"><strong>Category : </strong></label>
                        <select id="category" name="category" class="col-12 py-2">
                            <?php foreach ($data as $key => $value) { ?>
                                <option value="<?php echo $value['id']?>"><?php echo $value['name'];?></option>
                                
                            <?php } ?>
                        </select>
                        <?php if (isset($error['category'])) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><?php echo $error['category']; ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="image"><strong>Image :</strong></label>
                        <input type="file" class="form-control" id="image" placeholder="Insert Image" name="image">
                        <?php if (isset($error['image'])) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><?php echo $error['image']; ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="video"><strong>Video :</strong></label>
                        <input type="file" class="form-control" id="video" placeholder="Insert video" name="video">
                        <?php if (isset($error['video'])) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><?php echo $error['video']; ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="dynamic-field"></div>
                    <div class="tags-input form-group col-md-12">
                        <nr />
                        <label for="text">Enter Tags</label>
                        <ul id="tags"></ul>
                        <input type="text" class="form-control" id="input-tag" placeholder="Add a tag" />
                    </div>

                    <div class="form-group col-md-12">
                        <label for="des"><strong>Description : </strong></label><br>
                        <textarea id="des" name="des" rows="4" cols="140" placeholder="Enetr Description about your Post...."></textarea>
                        <?php if (isset($error['des'])) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><?php echo $error['des']; ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php } ?>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Post</button>
            </div>
        </form>
    </div>


<?php include('./partials/footer.php'); ?>

</body>
<script src="assets/js/script.js"></script>
