<?php
class Comment
{
    private $id;
    private $text;
    private $article;
    private $author;

    public function __construct($datos)
    {
        $this->id = $datos['id'];
        $this->text = $datos['comentario'];
        $this->article = ArticleRepository::getArticleById($datos['articulo']);
        $this->author = UserRepository::getUserById($datos['autor']);
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

    public function setId($iden)
    {
        return $this->id = $iden;
    }

    public function setComment($text)
    {
        $this->text = $text;
    }

    public function setAuthor($author)
    {
        return $this->author = $author;
    }

    public function setArtile($article)
    {
        return $this->article = $article;
    }
}
