<?php
include_once(__DIR__ . '/function.php');
$comment_id = $_GET['comment_id'];
$post_id = $_GET['post_id'];
// echo $comment_id ."<br>";
// echo $post_id;
deleteComment($comment_id);
redirect($base_url . '/blog_info.php?id=' . $post_id);


?>

<div class="ms-auto">

    <?php if ($isAut) { ?>
        <a style="float:right" type="button" class="btn btn-outline-danger btn-sm " href="delete_comment.php?comment_id=<?php echo $value['id'] ?>&post_id=<?php echo $post_id ?>">Delete</a>

    <?php } ?>
</div>


<?php foreach ($comment as $key => $value) { ?>
    <div class="d-flex my-3">
        <div class="flex-shrink-0"><img style="width: 50px; height: 50px;" class="rounded-circle" src="<?php echo $base_url . '/uploads/' . $value['image']; ?>" alt="..." /></div>
        <div class="ms-3">
            <div class="fw-bold"><?php echo $value['name']; ?></div>
            <div class="fw"><?php echo $value['comment']; ?>

            </div>

        </div>


    </div>
    </div>

<?php } ?>