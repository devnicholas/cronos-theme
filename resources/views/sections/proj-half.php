<?php $proj = $args['data']; ?>
<div class="vertical-column">
    <a href="<?= $proj['link'] ?>" class="hidden md:flex mosaic-vertical" style="background-image: url(<?= $proj['image_vertical'] ?>);">
        <p class="font-medium text-lg uppercase"><?= $proj['title'] ?></p>
        <p class="text-sm font-light mt-1"><?= $proj['resume'] ?></p>
    </a>
</div>