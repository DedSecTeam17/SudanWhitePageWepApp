<?php
/**
 * Created by PhpStorm.
 * User: Mohammed Elamin
 * Date: 28/11/2018
 * Time: 00:32
 */

require 'models/Post.php';

class PostController extends Controller
{


    public function __construct()
    {
    }


    public function index()
    {
        return $this->view('post.index');
    }

    public function create($args = false)
    {

        $model = new Post('Title', 'body');
        echo 'This is the title--->' . $model->getTitle() . '</br>';
        echo 'This is the body---->' . $model->getBody() . '</br>';

        return $this->view('post.create');

    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

}