<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class File extends Eloquent
{
    protected $fillable = ['name'];

    static function allFiles()
    {
        return self::all();
    }

    public function getByUserId($id)
    {
        return $this->where('user_id', $id)->get();
    }

    public function getUserByLogin($login)
    {
        return $this->where('email', $login)->first()->toArray();
    }


    public function store($userPhoto)
    {
        $file = File::create(
            array(
                'name' => $userPhoto,
            )
        );
        return $file->id;
    }

}