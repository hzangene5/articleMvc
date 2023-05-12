<?php
class Articles extends Controller
{
    protected $articleModel;

    public function __construct()
    {
    
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $this->articleModel = $this->model('Article');


    }

    public function index()
    {
        // Get Article
        $articles = $this->articleModel->getArticle();
        $data = [
            'articles' => $articles
        ];

        $this->view('articles/index', $data);
    }


}