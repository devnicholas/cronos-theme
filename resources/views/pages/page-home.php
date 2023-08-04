<?php get_header(); ?>
<?php $data = ContentController::getContent(); ?>
<div class="h-screen flex flex-col">
    <div class="hidden md:flex justify-between h-full items-stretch ">
        <?php foreach ($data['slider'] as $slider) { ?>
            <div style="background-image: url(<?= $slider['image'] ?>);" class="banner-item">
                <div>
                    <a href="<?= $slider['url'] ?>">
                        <p class="mb-3 uppercase text-2xl font-light"><?= $slider['title'] ?></p>
                    </a>
                    <a href="<?= $slider['url'] ?>" class="btn-link text-white">Ver mais</a>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="slider relative md:hidden">
        <?php foreach ($data['slider'] as $slider) { ?>
            <div style="background-image: url(<?= $slider['image'] ?>);" class="banner-item">
                <div>
                    <a href="<?= $slider['url'] ?>">
                        <p class="mb-3 uppercase text-2xl font-light"><?= $slider['title'] ?></p>
                    </a>
                    <a href="<?= $slider['url'] ?>" class="btn-link text-white">Ver mais</a>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php get_footer(); ?>
</div>