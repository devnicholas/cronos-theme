<?php

add_action('admin_menu', function () {
    $importer = new ImporterController();
    $importer->init();
});
