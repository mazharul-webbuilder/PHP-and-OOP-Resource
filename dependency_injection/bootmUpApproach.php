<?php

class Course
{
    public $cid;

    public function __construct($cid)
    {
        $this->cid = $cid;
    }
}

class Lesson extends Course
{
    public $lid;
    public function __construct($lid, Course $course)
    {
        $this->lid = $lid;
        $this->lid = $course->cid;
    }

    public function showLessons(): void
    {
        echo 'Here are some lessons'. PHP_EOL;
    }
}

class Quiz extends Course
{
    public $qid;
    public function __construct($qid)
    {
        $this->qid = $qid;
    }

    public function showquiz(): void
    {
        echo 'Here are some quiz'. PHP_EOL;
    }
}


$course = new Course(10);
$lesson = new Lesson(10, $course);