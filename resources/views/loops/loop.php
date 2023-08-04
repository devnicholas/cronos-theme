<?php $data = ContentController::getContent(); ?>
<div class="mb-4">
    <?php if ($data['image']) { ?>
        <a href="<?= $data['link']; ?>" aria-hidden="true" tabindex="-1">
            <img src="<?= $data['image'] ?>" alt="" class="mx-auto mb-2">
        </a>
    <?php } ?>
    <a href="<?= $data['link'] ?>">
        <h2 class="text-2xl text-center font-medium text-primary"><?= $data['title'] ?></h2>
    </a>
    <?php if ($data['excerpt']) { ?>
        <p class="mt-2"><?= $data['excerpt'] ?></p>
    <?php } ?>
</div>