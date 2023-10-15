<?php
/*Don't follow this approach*/
class Course
{
    public $cid;
    public $lidObj;

    public function __construct($cid, $lid)
    {
        $this->cid = $cid;
        $this->lidObj = new Lesson($lid);
    }
}
class Lesson extends Course
{
    public $lid;

    public function __construct($lid)
    {
        $this->lid = $lid;
    }

    public function showLesson(): void
    {
        echo "lesson show" . PHP_EOL;
    }
}


$course = new Course(1, 100);
$course->lidObj->showLesson();