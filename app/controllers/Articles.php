<?php
class Articles extends Controller
{

    public function __construct()
    {
    
    }

    public function index()
    {

        $data = [ ];

        $this->view('articles/index', $data);
    }

}