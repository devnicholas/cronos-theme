<?php get_header(); ?>
<?php
$portfolioData = PortfolioController::getItems();

$categories = $portfolioData['categories'];
$items = $portfolioData['items'];

?>
<div class="container my-8 px-4 md:px-0 flex flex-col md:flex-row items-center justify-between">
    <h1 class="text-primary font-bold text-xl mb-6 md:mb-0">PORTFÓLIO</h1>
    <ul class="tabs">
        <?php
        $count = 0;
        foreach ($categories as $key => $cat) {
        ?>
            <li><a href="#" data-tab="<?= $key ?>" class="<?= $count == 0 ? 'active' : '' ?>"><?= $cat ?></a></li>
        <?php
            $count++;
        }
        ?>
    </ul>
</div>
<div class="container px-4 md:px-0">
    <div class="tabs-container">
        <?php
        $count = 0;
        foreach ($items as $cat => $item) {
        ?>
            <div id="<?= $cat ?>" class="<?= $count == 0 ? 'active' : '' ?>">
                <p class="uppercase font-light"><?= $categories[$cat]; ?></p>
                <div class="flex justify-start items-stretch flex-wrap my-6">
                    <?php
                    $totalItems = count($item);
                    foreach ($item as $i => $proj) {
                        $mosaicData = PortfolioController::mosaicData($i, $totalItems);
                        get_template_part('resources/views/sections/proj', $mosaicData, [
                            'data' => $proj,
                        ]);
                    }
                    ?>
                </div>
            </div>
        <?php
            $count++;
        }
        ?>
    </div>
</div>
<?php get_footer(); ?>