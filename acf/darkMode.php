<?php
$acf = new AcfBuilder('dark_mode', 'Cor da página');
$acf->setLocate(['page', 'post'], 'post_type');
$acf->createField('theme', 'Cores da página', 'select', [
    'choices' => [
        'default' => 'Igual ao tema',
        'dark' => 'Escuro',
        'light' => 'Claro'
    ],
]);
