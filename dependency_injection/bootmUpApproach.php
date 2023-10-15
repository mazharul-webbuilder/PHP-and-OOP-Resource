<?php

class Course
{
    public $cid;

    public function __construct($cid)
    {
        $this->cid = $cid;
    }

    public function courseMethod()
    {
        echo "course method executed" . PHP_EOL;
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

    public function lessonMethod(): void
    {
        echo 'Lesson method executed'. PHP_EOL;
    }
}



$course = new Course(10);
$lesson = new Lesson(10, $course);