<?php $data = ContentController::getContent(); ?>
<?php get_header(); ?>
<div class="container my-8 px-4 md:px-0">
    <h1 class="text-3xl text-primary font-medium"><?= $data['title'] ?></h1>
    <div class="content mt-3">
        <?= $data['content']; ?>
    </div>
</div>
<?php get_footer(); ?>