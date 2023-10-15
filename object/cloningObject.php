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
$post2 = $post1; // copy  by reference
$post2 = clone $post1; // copy value

echo $post2->post = 'This is modified';