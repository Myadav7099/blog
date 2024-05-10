<?php
include(__DIR__ . '/../function.php');
include(__DIR__ . '/partials/nav.php');

$success = getMessage('success', true);
$error = getMessage('error', true);
?>

<?php if ($success) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?php echo $success; ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>