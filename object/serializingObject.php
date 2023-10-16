<?php

class Postss
{

    /*serialize is called save the object*/
    public $post;

    public function __construct($post)
    {
        $this->post = $post;
    }
}

$postss1 = new Postss("This is first post");
//$serialised = serialize($postss1);
//echo $serialised;
//file_put_contents("posts.txt", $serialised);

$unserialised = file_get_contents("posts.txt");
$post2 = unserialize($unserialised);
echo $post2->post;
