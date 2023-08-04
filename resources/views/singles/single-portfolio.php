<?php $data = ContentController::getContent(); ?>
<div class="container my-8 px-4 md:px-0">
    <div class="mb-6 flex flex-col md:flex-row justify-between text-center md:text-left">
        <div class="mb-4 md:mb-0">
            <h1 class="text-primary font-medium uppercase text-3xl mb-2"><?= $data['title']; ?></h1>
        </div>
        <div class="a2a_kit a2a_kit_size_32 a2a_default_style flex justify-center md:justify-end">
            <a class="a2a_button_facebook"></a>
            <a class="a2a_button_twitter"></a>
            <a class="a2a_button_whatsapp"></a>
            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
        </div>
    </div>

    <div class="content">
        <?= $data['infos'] ?? ''; ?>
    </div>
</div>
<div class="bg-primary">
    <div class="container py-8 px-4 md:px-0">
        <h3 class="font-medium text-black uppercase text-xl mb-3">Veja mais</h3>
        <?php
        $query = new WP_Query([
            'post_type' => 'portfolio',
            'post_status' => 'publish',
            'posts_per_page' => 3,
            'post__not_in' => [$data['id']],
        ]);
        ?>
        <div class="flex flex-col md:flex-row">
            <?php
            while ($query->have_posts()) {
                $query->the_post();
                $data = ContentController::getContent();
            ?>
                <div class="w-full md:w-1/2">
                    <?php
                    get_template_part('resources/views/sections/proj-full', null, [
                        'data' => $data,
                    ]);
                    ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<script>
    var a2a_config = a2a_config || {};
    a2a_config.onclick = 1;
    a2a_config.locale = "pt-BR";
    a2a_config.num_services = 4;
</script>
<script async src="https://static.addtoany.com/menu/page.js"></script>