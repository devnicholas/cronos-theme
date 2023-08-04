<?php $proj = $args['data']; ?>
<a href="<?= $proj['link'] ?>" class="mosaic-horizontal" style="background-image: url(<?= $proj['image_horizontal'] ?>);">
    <p class="font-medium text-lg uppercase"><?= $proj['title'] ?></p>
    <p class="text-sm font-light mt-1"><?= $proj['resume'] ?></p>
</a>
</div>