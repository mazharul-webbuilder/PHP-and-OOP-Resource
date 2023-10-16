<?php

class Posts
{
    public $post;

    public function __construct($post)
    {
        $this->post = $post;
    }
}

$post1 = new Posts('This is first post');
$post2 = $post1; // copy  by reference if post1 value change in any property value will also change
$post2 = clone $post1; // copy value if post1 properties change clone object will not change

echo $post2->post = 'This is modified';