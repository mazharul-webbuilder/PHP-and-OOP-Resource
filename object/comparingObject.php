<?php

class Posts
{
    public $post;

    public function __construct($post)
    {
        $this->post = $post;
    }

    /*Identity Operator*/
    public function compare1(&$obj1, &$obj2)
    {
        if ($obj1 === $obj2)
        {
            return true;
        } else {
            return false;
        }
    }

    /*Comparison Operator*/
    public function compare2(&$obj1, &$obj2)
    {
        if ($obj1 == $obj2)
        {
            return true;
        } else {
            return false;
        }
    }
}
$post1 = new Posts("This is the First Post");
$post2 = new Posts("This is the First Post");