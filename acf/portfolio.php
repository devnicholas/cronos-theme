<?php
$newType = new CustomTypes('portfolio', 'Portfólio', true);
$newType->create([
    'menu_icon' => 'dashicons-images-alt',
    'rewrite' => [
        'slug' => 'portfolio',
        'with_front' => true
    ],
    'supports' => ['title'],
]);

$acf = new AcfBuilder('portfolio', 'Portfólio');
$acf->setLocate('portfolio', 'post_type');
$acf->createField('tab_basic_infos', 'Informações iniciais', 'tab');
$acf->createField('resume', 'Resumo', 'textarea');
$acf->createField('image_horizontal', 'Banner Horizontal', 'image', [
    'instructions' => 'Imagem na horizontal (modo paisagem)',
    'wrapper' => [
        'width' => '50%'
    ]
]);
$acf->createField('image_vertical', 'Banner Vertical', 'image', [
    'instructions' => 'Imagem na vertical (modo retrato)',
    'wrapper' => [
        'width' => '50%'
    ]
]);
$acf->createField('tab_about', 'Sobre o serviço', 'tab');
$acf->createField('infos', 'Informações', 'editor');

