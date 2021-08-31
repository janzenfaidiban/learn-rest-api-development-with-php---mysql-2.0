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

    // get user articles
    public function get_user_article() {
        $this->article_id = filter_var($this->article_id, FILTER_VALIDATE_INT);
        $this->user_id = filter_var($this->user_id, FILTER_VALIDATE_INT);

        global $database;

        $sql = "SELECT articles.article_id, articles.user_id, articles.category_id, articles.article_title,
                articles.article_body,
                categories.category_title
                FROM ". $this->table ."
                JOIN categories on categories.category_id = articles.category_id
                JOIN users on users.user_id = articles.user_id
                WHERE articles.article_id = '".$database->escape_value($this->article_id)."' &&
                articles.user_id = '".$database->escape_value($this->user_id)."'";

                $result = $database->query($sql);
                
                $article_info = $database->fetch_row($result);
                if(!empty($article_info)){
                    return $article_info;
                } else {
                    return false;
                }
    }

    // update articles
    public function update_article() {
        $this->article_id = filter_var($this->article_id, FILTER_VALIDATE_INT);
        $this->user_id = filter_var($this->user_id, FILTER_VALIDATE_INT);
        $this->category_id = filter_var($this->category_id, FILTER_VALIDATE_INT);

        global $database;

        $sql = "UPDATE ". $this->table . " SET 
                category_id = '".$database->escape_value($this->category_id)."',
                article_title = '".$database->escape_value($this->article_title)."',
                article_body = '".$database->escape_value($this->article_body)."'
                WHERE article_id = '".$database->escape_value($this->article_id)."' && 
                user_id = '".$database->escape_value($this->user_id)."' ";

                $article_updated = $database->query($sql);
                if($article_updated) {
                    return true;
                } else {
                    return false;
                }
    }

    // delete article
    public function delete_article(){
        $this->article_id = filter_var($this->article_id, FILTER_VALIDATE_INT);
        $this->user_id = filter_var($this->user_id, FILTER_VALIDATE_INT);

        global $database;

        $sql = "DELETE FROM ". $this->table ."
                WHERE article_id = '".$database->escape_value($this->article_id)."' && 
                user_id = '".$database->escape_value($this->user_id)."' ";

                $article_deleted = $database->query($sql);

                if($article_deleted) {
                    return true;
                } else {
                    return false;
                }
    }

    // latest Articles
    public function get_latest_articles() {
        global $database;

        $sql = "SELECT articles.article_id, articles.user_id, articles.category_id, articles.article_title,
                articles.article_body,
                categories.category_title, users.user_id, users.firstname, suers.lastname
                FROM ".$this->table."
                JOIN categories on articles.category_id = categories.category_id
                JOIN users on suers.user_id = articles.user_id order by articles.article_id desc limit 5";

                $result = $database->query($sql);
                $articleInfo = $database->fetch_array($result);
                return $articleInfo;
    }

}
// class Articles Ends
// instance of the class

$article = new Articles;

?>