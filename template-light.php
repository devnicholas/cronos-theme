<?php

/**
 * Template name: Light
 */
?>
<?php
$data = ContentController::getContent();
get_header();
?>
<div class="container my-8 px-4 md:px-0">
    <div class="content">
        <?= $data['content']; ?>
    </div>
</div>
<?php get_footer(); ?>