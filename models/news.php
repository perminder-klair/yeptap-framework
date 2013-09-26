<?php
/**
 * The News Model does the back-end heavy lifting for the News Controller
 */
class News_Model
{
	/**
     * Array of articles. Array keys are titles, array values are corresponding
     * articles.
     */
    /*private $articles = array
    (
        //article 1
        'new' => array
        (
            'title' => 'New Website' ,
            'content' => 'Welcome to the site! We are glad to have you here.'
        )
        ,
        //2
        'mvc' => array
        (
            'title' => 'PHP MVC Frameworks are Awesome!' ,
            'content' => 'It really is very easy. Take it from us!'
        )
        ,
        //3
        'test' => array
        (
            'title' => 'Testing' ,
            'content' => 'This is just a measly test article.'
        )
    );*/

    /**
     * Holds instance of database connection
     */
    private $db;

    public function __construct()
    {
        $this->db = new MysqlImproved_Driver;
    }

    /**
     * Fetches article based on supplied name
     *
     * @param string $author
     *
     * @return array $article
     */
    public function get_article($author)
    {
        //connect to database
        $this->db->connect();

        //sanitize data
        $author = $this->db->escape($author);

        //prepare query
        $this->db->prepare
            (
                "
        SELECT
            `date`,
            `title`,
            `content`,
            `author`
        FROM
            `articles`
        WHERE
            `author` = '$author'
        LIMIT
            1
        ;
        "
            );

        //execute query
        $this->db->query();

        $article = $this->db->fetch('array');

        return $article;
    }
}