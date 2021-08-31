<?php 
// require_once('../includes/Database.php');

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..') . $ds;
require_once("{$base_dir}includes{$ds}Database.php");

// class articles Starts
class Articles {
    private $table = 'articles';

    // Articles Properties
    public $article_id;
    public $user_id;
    public $category_id;
    public $article_title;
    public $article_body;
    public $article_created_on;
    public $status;

    public function __construct() {

    }

    // validating the params
    public function validate_article_param($value){
        if(!empty($value)){
            return true;
        } else {
            return false;
        }
    }

    // function to create an article
    public function create_articles() {
        // clean data
        $this->user_id = filter_var($this->user_id, FILTER_VALIDATE_INT);
        $this->category_id = filter_var($this->category_id, FILTER_VALIDATE_INT);
        $this->article_title = trim(htmlspacialchars(strip_tags($this->article_title)));
        $this->article_body = trim(htmlspacialchars(strip_tags($this->article_body)));
        $this->article_created_on = date('Y-m-d');

        global $database;

        $sql = "INSERT INTO $this->table (user_id, category_id, article_title, article_body, article_created_on)
                VALUES ('".$database->escape_value($this->user_id)."',
                        '".$database->escape_value($this->category_id)."',
                        '".$database->escape_value($this->article_title)."',
                        '".$database->escape_value($this->article_body)."',
                        '".$database->escape_value($this->article_created_on)."')";

                        $article_saved = $database->query($sql);
                        if($article_saved) {
                            return true;
                        } else {
                            return false;
                        }

    }

}
// class Articles Ends
?>