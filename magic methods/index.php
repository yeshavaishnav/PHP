<?php

class User
{
    private $name;
    private $surname;
    public function __construct($name, $surname)
    {
        $this->name = $name;
        $this->surname = $surname;
    }

    public function display()
    {
        echo $this->name . " " . $this->surname;
    }

    public function __call($methodname,$args)
    {
        $args = implode(',',$args);
        echo "The method $methodname having parameters $args does not exist ";
    }
    public static function __callStatic($methodname,$args)
    {
        echo "undefined static method called";
    }
    // public function __destruct()
    // {
    //     echo "destructor called";
    // }
    public function __get($name)
    {
        return $this->$name;
    }
}
$user = new User("Yesha", "Vaishnav");
// $user->display();
// $user->abc("yesha","vaishnav");
// User::xyz();
echo $user->name;
