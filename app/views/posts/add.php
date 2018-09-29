<?php require APPROOT . '/views/includes/header.php'; ?>
    <a href="<?= URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>

    <div class="card card-body bg-light mt-5">

        <h2>Add Post</h2>
        <p>Create a Post with this form.</p>
        <form action="<?php echo URLROOT; ?>/posts/add" method="post">

            <div class="form-group">
                <label for="title">Title:<sup>*</sup></label>
                <input type="text" name="title"
                       class="form-control form-control-lg <?php !empty($data['title_err']) ? 'is_invalid' : ''; ?>"
                       value="<?= $data['title']; ?>">
                <span class="invalid-feedback d-block">
                        <?= $data['title_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="body">body:<sup>*</sup></label>
                <textarea name="body"
                          class="form-control form-control-lg<?php !empty($data['body_err']) ? 'is_invalid' : ''; ?>">
                        <?= $data['body']; ?>
                        </textarea>
                <span class="invalid-feedback d-block"><?php echo $data['body_err']; ?></span>
            </div>

            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>

<?php require APPROOT . '/views/includes/footer.php'; ?>