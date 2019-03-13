<?php
    namespace Controllers;
    use \Models\Addquestion;

    class AddquestionController {

        protected $twig ;

        public function __construct()
        {
            $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../Views') ;
            $this->twig = new \Twig_Environment($loader) ;
        }

        public function get() {
            echo $this->twig->render("addquestion.html") ;
        }
        
        public function post() {
            $question_number=$_POST['question_number'];
            $question_text = $_POST['question_text'];
            $options=array();
            $options['1']=$_POST['option1'];
            $options['2']=$_POST['option2'];
            $options['3']=$_POST['option3'];
            $options['4']=$_POST['option4']; 
            $correct_option=$_POST['correct_option'];
            $points=$_POST['points'];
            AddQuestion::AddQuestion($question_number,$question_text,$points);
            AddQuestion::AddOptions($question_number,$correct_option,$options);

            header("Location: /addquestion");
        }
    }
