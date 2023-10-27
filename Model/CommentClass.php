<?php
class Comment
{
    private $id;
    private $text;
    private $article;
    private $author;
    private $fecha;
    private $answers;

    public function __construct($datos)
    {
        $this->id = $datos['id'];
        $this->text = $datos['comentario'];
        $this->fecha = $datos['date'];
        $this->article = ArticleRepository::getArticleById($datos['articulo']);
        $this->author = UserRepository::getUserById($datos['autor']);
        $this->answers = CommentRepository::getAnswers($this->id);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getComment()
    {
        return $this->text;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getArticle()
    {
        return $this->article;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getAnswers()
    {
        return $this->answers;
    }

    public function setId($iden)
    {
        $this->id = $iden;
    }

    public function setComment($text)
    {
        $this->text = $text;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setArtile($article)
    {
        $this->article = $article;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
}
