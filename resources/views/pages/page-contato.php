<?php get_header(); ?>
<?php $data = ContentController::getContent(); ?>
<div class="container my-8 px-4 md:px-0">
    <h1 class="text-primary font-bold text-3xl">CONTATO</h1>
</div>
<div class="py-12">
    <div class="container flex flex-col md:flex-row px-4 md:px-0">
        <div class="md:w-1/2 mb-4">
            <div class="bg-white text-black shadow-lg rounded-lg py-6 px-8">
                <p class="text-2xl">Entre em contato</p>
                <div class="form mt-3">
                    <?= do_shortcode($data['form']); ?>
                </div>
            </div>
        </div>
        <div class="md:w-1/2 md:pl-6">
            <div class="mb-4">
                <p class="text-xl font-semibold">Endereço</p>
                <p class="font-light"><?= $data['address']; ?></p>
            </div>
            <div class="mb-4">
                <p class="text-xl font-semibold">Telefone</p>
                <p class="font-light"><?= $data['phone']; ?></p>
            </div>
            <div class="mb-4">
                <p class="text-xl font-semibold">E-mail</p>
                <p class="font-light"><?= $data['email']; ?></p>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>