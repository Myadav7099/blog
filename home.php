<?php
include(__DIR__ . '/function.php');
include(__DIR__ . '/partials/head.php');
include(__DIR__ . '/partials/header.php');
isAuthenticate();
$success = getMessage('success', true);
$error = getMessage('error', true);

$populer = getPopulerPost();
$recent = getRecentPost();

?>

<?php if ($success) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?php echo $success; ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>



<div class="home-demo container jumbotron ">
    <h3>Populer</h3>
    <hr/>
    <div class="owl-carousel owl-theme">
        <?php foreach ($populer as $key => $value) { ?>
            <div class="item">                
                <a href="./blog_info.php?id=<?php echo $value['id']?>">
                    <img src="<?php echo $base_url.'/uploads/'.$value['image']; ?>" alt="Error Loading Image"> 
                </a>
            </div>
        <?php } ?>
    </div>
</div>

<div class="home-demo container jumbotron ">
    <h3>Recent</h3>
    <hr/>
    <div class="owl-carousel owl-theme">
        <?php foreach ($recent as $key => $value) { ?>
            <div class="item"> 
                <a href="./blog_info.php?id=<?php echo $value['id']?>">
                    <img src="<?php echo $base_url.'/uploads/'.$value['image']; ?>" alt="Error Loading Image"> 
                </a>               
            </div>
        <?php } ?>
    </div>
</div>



<?php include('./partials/footer.php'); ?>
<script src="assets/js/carousel.js"></script>