<?php
class PortfolioController
{
    private static $withoutCategorySlug = 'sem-categoria';

    private static $withoutCategoryName = 'Sem categoria';

    public static function getItems()
    {

        $categories = self::getCategories(true);
        $items = self::getCategories(false);

        $query = new \WP_Query([
            'post_type' => 'portfolio',
            'post_status' => 'publish',
            'post_count' => -1,
        ]);

        while ($query->have_posts()) {
            $query->the_post();
            $data = ContentController::getContent();
            $cats = get_the_terms($data['id'], 'portfolio_categories');
            if ($cats) {
                foreach ($cats as $cat) {
                    $items[$cat->slug][] = $data;
                }
            } else {
                $items[self::$withoutCategorySlug][] = $data;
            }
        }

        return [
            'categories' => $categories,
            'items' => $items
        ];
    }

    private static function getCategories($withName = true)
    {
        $cats = [];
        $categories = get_categories([
            'taxonomy' => 'portfolio_categories',
            'orderby' => 'count',
            'order'   => 'DESC'
        ]);
        foreach ($categories as $category) {
            $cats[$category->slug] = $withName ? $category->name : [];
        }
        $cats[self::$withoutCategorySlug] = $withName ? self::$withoutCategoryName : [];

        return $cats;
    }

    public static function mosaicData($index, $items)
    {
        if ($items % 3 == 0) { // Only mosaics with 3
            return self::mosaicWithThree($index);
        } else if ($items % 3 == 2) { // Has one mosaic with 2
            if ($index < 2) {
                return 'half';
            } else {
                return self::mosaicWithThree($index - 2);
            }
        } else if ($items % 3 == 1) { // Has one mosaic with 1
            if ($index < 1) {
                return 'full';
            } else {
                return self::mosaicWithThree($index - 1);
            }
        }

        return '';
    }
    private static function mosaicWithThree($index)
    {
        if ($index % 3 == 0) { // First item on mosaic with 3 items
            return 'half';
        } else if (($index - 1) % 3 == 0) { // Second item on mosaic with 3 items
            return 'half-start';
        } else { // Third item on mosaic with 3 items
            return 'half-end';
        }

        return '';
    }
}
