<?php

namespace owtta\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getCommentsCountByChapter($chapterId)
    {
        $db = $this->dbConnect();
        $commentsCount = $db->prepare('SELECT COUNT(*) FROM comments WHERE post_id= ?');
        $commentsCount->execute(array($chapterId));
        $commentsNumber = $commentsCount->fetch();
        return $commentsNumber;
    }
    
    public function getComments($chapterId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, status FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($chapterId));
        return $comments;
    }
    
    public function getCommentsCount()
    {
        $db = $this->dbConnect();
        $commentsCount = $db->query('SELECT COUNT(*) FROM comments');
        $commentsNumber = $commentsCount->fetch();
        return $commentsNumber;
    }
    
    public function getReportedCommentsCount()
    {
        $db = $this->dbConnect();
        $commentsCount = $db->query('SELECT COUNT(*) FROM comments WHERE status = "reported"');
        $commentsNumber = $commentsCount->fetch();
        return $commentsNumber;
    }
}