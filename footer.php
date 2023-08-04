<?php $themeData = THEME_DATA; ?>
<div class="dark:bg-black dark:text-white border-t py-4">
    <div class="container flex flex-col md:flex-row-reverse justify-between items-center px-4 md:px-0">
        <div class="flex">
            <?php foreach ($themeData['socials'] as $social) { ?>
                <a href="<?= $social['url'] ?>" target="_blank" class="mr-3">
                    <img src="<?= $social['icon'] ?>" alt="">
                </a>
            <?php } ?>
        </div>
        <div class="mt-2 md:mt-0">
            <p class="text-center md:text-left text-xs"><?= $themeData['copyright'] ?></p>
        </div>
    </div>
</div>
<input type="hidden" name="themeUrl" id="themeUrl" value="<?= THEME_URL ?>">
<div class="fixed bottom-4 right-4 bg-gray-200">
    <button type="button" id="changeTheme" class="dark:bg-black bg-white text-gray-500">Change Theme</button>
</div>
<?php wp_footer(); ?>

</body>

</html>