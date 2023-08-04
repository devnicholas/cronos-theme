<?php
$acf = new AcfBuilder('home', 'Home');
$acf->setLocate('home', 'page_slug');
$acf->createGroup('slider', 'Slider', true, [
    FieldsController::create('slider_image', 'Imagem', 'image'),
    FieldsController::create('slider_title', 'Título'),
    FieldsController::create('slider_url', 'URL'),
], [
    'max' => 5,
    'min' => 4,
]);