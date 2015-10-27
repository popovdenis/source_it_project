<?php

class Answer
{

    private $answer;
    private $id;

    public function __construct($id,$answer)
    {
        $this->answer = $answer;
        $this->id = $id;
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function getAnswer()
    {
        return $this->answer;
    }

    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }


}