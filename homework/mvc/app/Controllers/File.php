<?php

namespace App;

class File extends MainController
{

    public function show()
    {

        $id = $_GET['id'];

        if (!empty($id)) {
            $userFiles = $this->file->getByUserId($id);
            $this->view->twigRender('userImages', ['images' => $userFiles, 'userId' => $id]);
            return;
        }

        echo 'No user with this id!';

    }

    public function upload()
    {
        $userId = $_GET['id'];
        if ($userId && !empty($_FILES['photo']['tmp_name'])) {
            $fileContent = file_get_contents($_FILES['photo']['tmp_name']);
            $filePath = PUBLIC_PATH . '/img/' . $_FILES['photo']['name'];
            file_put_contents($filePath, $fileContent);
            $userPhoto = '/img/' . $_FILES['photo']['name'];
            $photoId = $this->file->store($userId, $userPhoto);
            if ($photoId) {
                header('Location: /file/show/?id=' . $userId);
                die;
            }
        }
    }
}