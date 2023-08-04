<?php
class ImporterController
{

    /**
     * Add admin page to the WordPress backend
     */
    public function init()
    {
        $image = THEME_DIR . '/static/images/blank.svg';
        $imageData = base64_encode(file_get_contents($image));
        $icon = 'data:image/svg+xml;base64,' . $imageData;

        \add_menu_page(
            'Opções do tema',
            'Opções do tema',
            'manage_options',
            'admin.php?page=theme_config',
            false,
            $icon,
            80,
        );

        \add_submenu_page(
            'admin.php?page=theme_config',
            'Importar conteúdo do tema',
            'Importar conteúdo do tema',
            'manage_options',
            'theme-options',
            [$this, 'loadPage'],
            10,
        );
    }

    public function loadPage()
    {
        $hasACF = function_exists('acf_add_local_field'); // Check if the 'ACF PRO' has be instaled.
        if (!$hasACF) {
            new Alerts('Você ainda não possui o ACF PRO instalado.', 'warning');
        }
        if (isset($_POST['submit'])) {
            if (isset($_POST['menus'])) {
                $this->menusImport();
            }
            if (isset($_POST['posts'])) {
                $this->postsImport();
            }
            if (isset($_POST['configs'])) {
                $this->configsImport();
            }
        }
        echo Form::getForm($hasACF);
    }

    private function getData()
    {
        $data = file_get_contents(THEME_DIR . '/theme-data.json');
        $dataFormatted = json_decode($data, true);
        return $dataFormatted;
    }

    private function menusImport()
    {
        try {
            $data = $this->getData();
            $menus = $data['menus'];

            MenusController::import($menus);
        } catch (\Exception $e) {
            new Alerts('Ocorreu um erro ao cadastrar os menus: ' . $e->getMessage(), 'error');
        }
    }

    private function postsImport()
    {
        try {
            $data = $this->getData();
            $posts = $data['posts'];

            PostsController::import($posts);
        } catch (\Exception $e) {
            new Alerts('Ocorreu um erro ao cadastrar os posts: ' . $e->getMessage(), 'error');
        }
    }

    private function configsImport()
    {
        try {
            $data = $this->getData();
            $configs = $data['configs'];

            ConfigsController::import($configs);
        } catch (\Exception $e) {
            new Alerts('Ocorreu um erro ao cadastrar as páginas: ' . $e->getMessage(), 'error');
        }
    }
}
