<?php
namespace App;

class User
{
    public function test()
    {
        $object = new testClass();
        $object->setData(['id' => 1, 'name' => 'asd']);
        echo $object;
    }

    public function index()
    {
//        echo \User::where('id', '>', 10)->get();
        echo json_encode(\User::all()->toArray());
    }

    public function store()
    {
        $data = [
            'name' => 'asd',
            'password' => 'pwd',
            'info' => 'info',
            'age' => 15
        ];
        echo \User::create($data);
    }

    public function show($id = 32)
    {
        echo \User::find($id);
    }
}


class testClass
{
    protected $data;

    public function __toString()
    {
        return json_encode($this->getData());
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
}