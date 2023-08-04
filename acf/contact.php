<?php
$acf = new AcfBuilder('contato', 'Contato');
$acf->setLocate('contato', 'page_slug');
$acf->createField('form', 'Snippet do formulário', 'text', [
    'instructions' => 'Recomenda-se usar o plugin Contact Form 7 para criar os formulários'
]);
$acf->createField('address', 'Endereço');
$acf->createField('phone', 'Telefone');
$acf->createField('email', 'E-mail');
