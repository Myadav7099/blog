<?php
include_once(__DIR__ . '/function.php');
isAuthenticate();
if (isset($_GET['id'])) {
    $post_id = $_GET['id'];
}
$post_info = getPostInfo($post_id);
if (isset($post_info['tags'])) {
    $tags = $post_info['tags'];
    $realTag = unserialize($tags);    
}
$comment = getPostComment($post_id);
$isAut = isAuther($post_info['auther_id']);
$data = getCategoryName();

if (!$isAut) {
    incrementPostView($post_id);    
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Post </title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#!"><?php echo $post_info['first_name'] ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="add_post.php">Add Blog</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="post_listing.php">Blog's</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1"><?php echo $post_info['title'] ?></h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Posted on <?php echo date('d F Y',strtotime($post_info['creation_time'])) ; ?> by <?php echo $post_info['first_name'] . ' ' . $post_info['last_name'] ?></div>
                        <!-- Post categories-->
                                                <?php foreach ($realTag as $key => $value) { ?>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!"> <?php echo $value; ?></a>
                        <?php } ?>
                        <!-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a> -->
                    </header>

                    <!-- Preview image figure-->
                    <figure class="mb-4"><img style="width: 856px; height: 500px;" class="img-fluid rounded" src="<?php echo $base_url . '/uploads/' . $post_info['image'] ?>" alt="Error Loading Image" /></figure>
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4"><?php echo $post_info['des'] ?></p>
                    </section>
                </article>
                <!-- Comments section-->
                <section class="mb-5">
                    <div class="card bg-light">
                        <div class="card-body">
                            <!-- Comment form-->
                            <form class="mb-4" action="server/commentServer.php" method="POST">
                                <textarea class="form-control" rows="3" name="comment" placeholder="Join the discussion and leave a comment!"></textarea>
                                <input type="hidden" name="post_id" value=<?php echo $post_id ?>>
                                <button type="submit" class="btn btn-outline-primary btn-sm my-2 ">Add Comment</button>
                            </form>
                            <?php foreach ($comment as $key => $value) { ?>
                                <div class="d-flex my-3">
                                    <div class="flex-shrink-0"><img style="width: 50px; height: 50px;" class="rounded-circle" src="<?php echo $base_url . '/uploads/' . $value['image']; ?>" alt="..." /></div>
                                    <div class="ms-3" style="max-width:660px">
                                        <div class="fw-bold"><?php echo $value['name']; ?></div>
                                        <div class="fw"><?php echo $value['comment']; ?> </div>
                                    </div>
                                    <div class="ms-auto">
                                        <?php if ($isAut) { ?>
                                            <a style="float:right" type="button" class="btn btn-outline-danger btn-sm " href="delete_comment.php?comment_id=<?php echo $value['id'] ?>&post_id=<?php echo $post_id ?>">Delete</a>

                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <form action="post_listing.php" method="GET">
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" name="keyword" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <?php foreach ($data as $key => $value) { ?>
                                        <?php if ($value['id'] % 2 == 0) { ?>
                                            <li><a href="#"><?php echo $value['name'] ?></a></li>
                                        <?php } ?>
                                    <?php } ?>

                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <?php foreach ($data as $key => $value) { ?>
                                        <?php if ($value['id'] % 2 != 0) { ?>
                                            <li><a href="#"><?php echo $value['name'] ?></a></li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- video widget-->
                <div class="card mb-4">
                    <div class="card-header">Video Widget</div>
                    <div class="card-body">
                        <video width="385" height="240" controls>
                            <source src="<?php echo $base_url . '/uploads/' . $post_info['video'] ?>" type="video/mp4">
                            <source src="movie.ogg" type="video/ogg">
                            Error Loading video...
                        </video>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <!-- <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer> -->
    <?php include('./partials/footer.php'); ?>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src=""></script>
</body>



</html>