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

    public function showAnswers($idArticulo, $nivel = 1)
    {
        foreach ($this->answers as $answer) {
            echo '<article style="margin-left:' . ($nivel * 20) . 'px;" id="comment-answer">';
            echo '<p style="color:black;">' . $answer->getAuthor()->getUserName() . ' --- Respuesta a: ' . $this->getAuthor()->getUserName() . '</p>';
            echo '<p>' . $answer->getComment() . '</p>';
            echo '<p>' . $answer->getFecha() . '</p>';
            echo '</article>';
            echo '<form style="margin-left:' . ($nivel * 20) . 'px;" id="answer-form" action="" method="post">
                <textarea rows="3" name="comment" id="answer-send"></textarea>
                <input type="hidden" name="id_comentario" value="' . $answer->getId() . '"/>
                <input type="hidden" name="id_articulo" value="' . $idArticulo . '"/>
                <input id="answer-submit" type="submit" value="send-comment"/>
                </form>';
            if (!empty(CommentRepository::getAnswers($answer->getId()))) {
                $answer->showAnswers($idArticulo, ++$nivel);
            }
        }
    }
}
