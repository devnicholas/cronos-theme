<?php
class Alerts
{
    private $message = '';
    private $type = ''; // [error, warning, info]
    public function __construct($message = '', $type = 'success')
    {
        $this->message = $message;
        $this->type = $type;
        $this->render();
    }
    public function render()
    {
?>
        <div class="notice notice-<?= $this->type ?> is-dismissible">
            <p><?= $this->message; ?></p>
        </div>
<?php
    }
}
