<?php
    include(__DIR__ . '/partials/nav.php');
    $count = getTotalCategory();
    $limit = 6;
    $no_of_categoty = ceil($count / $limit);
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    $offset = (($page - 1) * $limit);
    $data = getCategoryData($limit , $offset);

    // print_r($date);die;
?>

<!-- number of pages in pagination  -->
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center my-4">
    <?php for ($i=0; $i < $no_of_categoty; $i++) { ?>
        <li class="page-item"><a class="page-link" href="list_category.php?page=<?php echo $i+1;?>"><?php echo $i+1;?></a></li>        
    <?php } ?>
  </ul>
</nav>

<!-- content per page using limit and offset  -->

<div class="container  ">
    <div class="row">
        <?php foreach ($data as $key => $value) {   ?>
            <div class="col-md-4 my-2">
                <div class="card" >
                    <img src="<?php echo $base_url . '/uploads/' . $value['category_image']; ?>" class="card-img-top" alt="Error Loading Image" >
                    <div class="card-body">
                        <h5 class="card-title"><?php echo substr($value['name'], 0, 25) ; ?></h5>                        
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>