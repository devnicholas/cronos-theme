<?php $proj = $args['data']; ?>
<div class="full-column">
    <a href="<?= $proj['link'] ?>" class="mosaic-horizontal-full" style="background-image: url(<?= $proj['image_horizontal'] ?>);">
        <p class="font-medium text-lg uppercase"><?= $proj['title'] ?></p>
        <p class="text-sm font-light mt-1"><?= $proj['resume'] ?></p>
    </a>
</div>