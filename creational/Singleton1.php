<?php

// === Singleton Class ===
// This class doesn't accept creating object directly
// But only accept creating object through make() method
// to make sure there is only one instance of this class

class Single
{
    protected static $me = null;
    protected function __construct()
    {
        $this->info = "I am a single.\n";
    }
    static function make()
    {
        if (!static::$me) {
          // new static() - returns the object of current class, regardless of which // classes is extended, and new self() - returns the object from the class // in which that method was declared or extended
            static::$me = new static;
        }
        return static::$me;
    }
}

$single = Single::make();
echo $single->info;

?>
