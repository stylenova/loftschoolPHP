<?php
/**
 * Created by PhpStorm.
 * User: style
 * Date: 18.03.2019
 * Time: 21:43
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class UserService extends Eloquent
{
    protected $userPhoto;

    public function wherePhotoBD($name, $filePath)
    {
        $file = UserService::create(
            array(
                'name' => $userPhoto,
                'user_id' => $userId
            )
        );
    }
}