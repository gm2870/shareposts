<?php require APPROOT . '/views/includes/header.php'; ?>

    <a href="<?= URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <br>
    <h1><?= $data['post']->title; ?></h1>
    <div class="bg-secondary text-white p-2 mb-3">
        Written by <?php echo $data['user']->name; ?> on <?php echo $data['post']->created_at; ?>
    </div>
    <p><?= $data['post']->body; ?></p>
<?php if ($data['post']->user_id == $_SESSION['user_id']) { ?>

    <a href="<?php echo URLROOT ?>/posts/edit/<?php echo $data['post']->id ?>" class="btn btn-dark">Edit</a>
    <form class="pull-right" action="<?= URLROOT ?>/posts/delete/<?= $data['post']->id; ?> " method="post">
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
    <?php
} ?>

<?php require APPROOT . '/views/includes/footer.php' ?>