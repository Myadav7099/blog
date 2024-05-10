<?php
include(__DIR__ . '/function.php');
include(__DIR__ . '/partials/head.php');
include(__DIR__ . '/partials/header.php');
$id = $_SESSION['loggedInUserId'];
isAuthenticate();

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $count = getTotalPost($keyword);
    $_SESSION['keyword'] = $keyword;
} else {
    $count = getTotalPost();
}


$limit = 3;

$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$offset = (($page - 1) * $limit);

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $data = getBolgPages($limit, $offset, $keyword);
} else {
    $data = getBolgPages($limit, $offset);
}


$no_of_posts = ceil($count / $limit);

?>

<?php if (empty($data)) {?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><?php echo "No Result Found "; ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php }?>

<div class="container my-3">
    <div aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php for ($i = 0; $i < $no_of_posts; $i++) {
                if (isset($_GET['keyword'])) { ?>
                    <li class="page-item"><a class="page-link" href="post_listing.php?page=<?php echo $i + 1; ?>&keyword=<?php echo $keyword?>"><?php echo $i + 1; ?></a></li>
                    <?php } else{ ?>
                    <li class="page-item"><a class="page-link" href="post_listing.php?page=<?php echo $i + 1; ?> "><?php echo $i + 1; ?></a></li>
                <?php } } ?>
        </ul>
    </div>
</div>




<div class="container  ">
    <div class="row">
        <?php foreach ($data as $key => $value) {   ?>
            <div class="col-md-4 my-2">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $base_url . '/uploads/' . $value['image']; ?>" class="card-img-top" alt="Error Loading Image" style="height: 250px;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo substr($value['title'], 0, 20) . '...'; ?> <i class="fa-regular fa-eye fa-xs" style="color:#ccc"></i><span style="margin-left:4px ; font-size:19px;"><?php echo $value['view'];?></span></h5>
                        <p class="card-text" style = "height: 70px" ><?php echo substr($value['des'], 0, 80) . '...' ?></p>
                        <a href="blog_info.php?id=<?php echo $value['id']; ?>" class="btn btn-primary">View More</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

</body>
    <?php include('./partials/footer.php'); ?>
</body>