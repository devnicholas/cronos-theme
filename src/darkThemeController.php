<?php
class DarkThemeController
{
    public static function init()
    {
        add_filter('body_class', function ($classes) {
            $isDark = false;

            $pageTheme = get_field('theme');
            if ($pageTheme && $pageTheme != 'default') {
                if ($pageTheme == 'dark') $isDark = true;
            } else {
                if (THEME_DATA['theme'] == 'dark') $isDark = true;
            }

            if ($isDark) $classes[] = 'dark';

            return $classes;
        });
    }
}
