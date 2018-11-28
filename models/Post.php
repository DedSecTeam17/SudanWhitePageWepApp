<?php
/**
 * Created by PhpStorm.
 * User: Mohammed Elamin
 * Date: 28/11/2018
 * Time: 00:38
 */

class  Post extends Model
{


    private $title;
    private $body;

    /**
     * Post constructor.
     * @param $title
     * @param $body
     */
    public function __construct($title, $body)
    {
        Parent::__construct();
        $this->title = $title;
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }


}