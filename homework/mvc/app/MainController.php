<?php
namespace App;

use App\Core\View;

class MainController
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function defaultPage()
    {
        if ($this->isUserAuthorized()) {
            header('Location:/user/showlist');
            die;
        } else {
            $this->view->twigRender('index', []);
        }
    }

    public function isUserAuthorized()
    {
        return isset($_SESSION['user_id']);
    }
}