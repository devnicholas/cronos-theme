<?php
class Form
{
    public static function getForm($hasACF)
    {
?>
        <div class="wrap">
            <h1>Importar conteúdo do tema</h1>
            <hr>
            <?php if (!$hasACF) { ?>
                <p>Alguns conteúdos necessitam da instalação do plugin ACF PRO, visite a página de <a href="<?= admin_url('plugins.php?page=tgmpa-install-plugins'); ?>">plugins recomendados</a> para realizar a instalação. Por hora algumas importações ficarão indisponíveis.</p>
            <?php } ?>
            <p>Todo o conteúdo importado será obtido através do arquivo <code>theme-data.json</code> que está na raiz do tema. Você pode altera-lo, caso queira.</p>
            <p>Escolha abaixo quais conteúdos deseja importar.</p>
            <form method="post">
                <table class="form-table">
                    <tbody>
                        <tr>
                            <th scope="row">
                                <label for="menus">Menus</label>
                            </th>
                            <td>
                                <label for="menus">
                                    <input type="checkbox" name="menus" id="menus">
                                    Importar menus
                                </label>
                                <p class="description">Caso o menu já exista, ele não será importado.</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="posts">Posts</label>
                            </th>
                            <td>
                                <label for="posts">
                                    <input type="checkbox" name="posts" id="posts" <?= !$hasACF ? 'disabled' : '' ?>>
                                    Importar posts
                                </label>
                                <p class="description">Os posts que ainda não existirem, serão criados durante a importação. Os que já existirem terão seu conteúdo sobrescrito.</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="configs">Configurações</label>
                            </th>
                            <td>
                                <label for="configs">
                                    <input type="checkbox" name="configs" id="configs" <?= !$hasACF ? 'disabled' : '' ?>>
                                    Importar configurações
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="submit">
                <p>A importação poderá levar alguns minutos, não feche essa página até ela estar concluída.</p>
                <input type="submit" name="submit" id="submit" class="button button-primary" value="Atualizar">
                </p>
            </form>
        </div>
<?php
    }
}
