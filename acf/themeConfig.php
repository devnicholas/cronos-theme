<?php
$themeConfigs = new OptionPages('Identidade do tema', 'theme_config', [
    'parent_slug' => 'admin.php?page=theme_config'
]);

$themeIdentity = new AcfBuilder('theme_config', 'Identidade do tema');
$themeIdentity->setLocate('theme_config', 'options_page');

$themeIdentity->createField('logo', 'Logo', 'image');
$themeIdentity->createField('theme', 'Cores do tema', 'select', [
    'choices' => [
        'dark' => 'Escuro',
        'light' => 'Claro'
    ],
    'instructions' => 'Você poderá alterar a cor para páginas específicas também.'
]);
$themeIdentity->createField('copyright', 'Copyright');
$themeIdentity->createGroup('socials', 'Redes sociais', true, [
    FieldsController::create('socials_icon', 'Ícone', 'image'),
    FieldsController::create('socials_url', 'URL', 'url'),
]);
