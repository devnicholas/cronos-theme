<?php get_header(); ?>
<div class="container px-4 md:px-0 mt-6">
    <div class="grid md:grid-cols-3 md:space-x-4">
        <?php
        while (have_posts()) {
            the_post();

            get_template_part('resources/views/loops/loop', get_post_type());
        }
        ?>
    </div>
</div>
<?php get_footer(); ?>