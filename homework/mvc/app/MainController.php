<?php
namespace App;

use App\Core\View;
use \App\Models\User as UserModel;
use \App\Models\File as FileModel;

class MainController
{
    protected $view;
    protected $user;
    protected $file;

    public function __construct()
    {
        $this->view = new View();
        $this->user = new UserModel();
        $this->file = new FileModel();
    }

    public function defaultPage()
    {
        if ($this->isUserAuthorized()) {
            header('Location:/user/administrator');
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