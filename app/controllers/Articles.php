<?php
class Articles extends Controller
{
    private $articleModel;

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

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => '',
            ];

            // Validate Data
            if (empty($data['title'])) {
                $data['title_err'] = 'فیلد عنوان مقاله الزامی است';
            }

            if (empty($data['body'])) {
                $data['body_err'] = 'فیلد متن مقاله الزامی است';
            }

            // Make sure no errors
            if (empty($data['title_err']) && empty($data['body_err'])) {

                if ($this->articleModel->addArticle($data)) {
                    flash('article_message', 'مقاله اضافه شد');
                    redirect('articles/index');
                } else {
                    die('add article error');
                }
            } else {
                // Load view with error
                $this->view('articles/add', $data);
            }
        } else {
            $data = [
                'title' => '',
                'body' => '',
                'title_err' => '',
                'body_err' => ''
            ];

            $this->view('articles/add', $data);
        }
    }


}