<?php

namespace App\Models;

class User
{
    protected $users = [
      'user1', 'user2', 'user3'
    ];
    public function all()
    {
        return $this->users;
    }

    public function first()
    {
        return $this->users[0];
    }

    public function get($id)
    {
        return $this->users[$id];
    }


    public function store($name, $user_id, $info)
    {
        //
    }
}
