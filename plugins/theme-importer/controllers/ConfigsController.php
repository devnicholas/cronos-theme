<?php
class ConfigsController
{
    static function import($configs): void
    {
        try {
            $fields = new Fields("options");
            $fields->updateFields($configs);
            new Alerts('Configurações cadastradas com sucesso');
        } catch (\Exception $e) {
            new Alerts('Ocorreu um erro ao cadastrar as Configurações: ' . $e->getMessage(), 'error');
        }
    }
}
