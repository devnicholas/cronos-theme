<?php
class MenusController
{
    public static function import($menus): void
    {
        try {
            foreach ($menus as $menu) {
                $menuName = $menu['name'];
                $menuPosition = $menu['position'];
                $items = $menu['items'];

                $menuExists = wp_get_nav_menu_object($menuName);
                if (!$menuExists) {
                    $menuId = wp_create_nav_menu($menuName);

                    foreach ($items as $item) {
                        wp_update_nav_menu_item($menuId, 0, array(
                            'menu-item-title' =>  $item['label'],
                            'menu-item-url' => $item['url'],
                            'menu-item-status' => 'publish'
                        ));
                    }

                    if (!has_nav_menu($menuPosition)) {
                        $locations = get_theme_mod('nav_menu_locations');
                        $locations[$menuPosition] = $menuId;
                        set_theme_mod('nav_menu_locations', $locations);
                    }
                }
            }
            new Alerts('Menus cadastrados com sucesso');
        } catch (\Exception $e) {
            new Alerts('Ocorreu um erro ao cadastrar os menus: ' . $e->getMessage(), 'error');
        }
    }
}
