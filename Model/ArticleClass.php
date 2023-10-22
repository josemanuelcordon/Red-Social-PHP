<?php
class Article
{
    private $id;
    private $title;
    private $text;
    private $fecha;
    private $author;
    private $likes;

    public function __construct($datos)
    {
        $this->id = $datos['id'];
        $this->title = $datos['title'];
        $this->text = $datos['text'];
        $this->fecha = $datos['date'];
        $this->author = UserRepository::getUserById($datos['autor']);
        $this->likes = ArticleRepository::getLikes($datos['id']);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getDate()
    {
        return $this->fecha;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getLikes()
    {
        return $this->likes;
    }

    public function setId($iden)
    {
        return $this->id = $iden;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setText($text)
    {
        return $this->text = $text;
    }

    public function setDate($fecha)
    {
        return $this->fecha = $fecha;
    }
}
