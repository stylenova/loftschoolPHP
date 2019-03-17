<?php

namespace App;

use GUMP;

class User extends MainController
{

    private $sort = false;


    public function index()
    {
        echo "users index";
    }

    public function create()
    {
        echo "User create interface";
    }

    public function pageReg()
    {
        $this->view->twigRender('registration', []);
    }

    public function pageAuth()
    {
        $this->view->twigRender('login', []);
    }

    public function administrator()
    {

        if (isset($_GET['sort']) && $_GET['sort'] === 'desc') {
            $this->sort = true;
        }
        $usersData = $this->user->allUsers($this->sort);
        $this->view->twigRender('users', ['users' => $usersData, 'sort' => $this->sort, 'isAdmin' => $this->isAdmin()]);
    }

    public function show()
    {
        $id = $_GET['id'];

        if (!empty($id)) {
            $userData = $this->user->getById($id);
            $this->view->twigRender('user', ['user' => $userData[0]]);
            return;
        }

        echo 'No user with this id!';
    }

    public function login()
    {
        $login = $_POST['login'];
        $user = $this->user->getUserByLogin($login);
        if (!$user) {
            $this->view->twigRender('login', ['info' => 'No user with this login and password 123']);
            die;
        }
        $gotPassword = $_POST['password'];
        if ($gotPassword !== $user['password']) {
            $this->view->twigRender('login', ['info' => 'No user with this login and password 123']);
            die;
        }
        $_SESSION['user_id'] = $user['id'];
        header('Location: /user/showlist');

    }

    public function registration()
    {

        if (empty($_POST)) {
            $this->view->twigRender('registration', []);
            die;
        }

        $result = GUMP::is_valid($_POST, [
            'email' => 'required|valid_email',
            'password' => 'required|max_len,15|min_len,6',
            'age' => 'integer',
            'info' => 'alpha_numeric',
        ]);

        if ($result === true) {
            $userData = $_POST;
            if (!empty($_FILES['photo']['tmp_name'])) {
                $fileContent = file_get_contents($_FILES['photo']['tmp_name']);
                $filePath = PUBLIC_PATH . '/img/' . $_FILES['photo']['name'];
                file_put_contents($filePath, $fileContent);
                $userData['photo'] = '/img/' . $_FILES['photo']['name'];
            }
            $userID = $this->user->store($userData);
            if ($userID) {
                header('Location: /');
                die;
            }

        } else {
            $this->view->twigRender('registration', ['error' => $result]);
        }
    }

    public function logOut()
    {
        unset($_SESSION['user_id']);
        header('Location: /');
    }

    private function isAdmin()
    {
        $userId = $_SESSION['user_id'];
        $user = $this->user->getAdminById($userId);
        return $user['admin'];
    }


}