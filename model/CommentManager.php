<?php

namespace owtta\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function addComment($chapterId, $pseudo, $comment)
    {
        $db = $this->dbConnect();
        $addComment = $db->prepare('INSERT INTO comments (post_id, author, comment, comment_date) VALUES (?, ?, ?, NOW())');
        $addComment->execute(array($chapterId, $pseudo, $comment));
        $addedComment = $addComment->fetch();
        return $addedComment;
    }
    
    public function editComment($commentId, $comment)
    {
        $db = $this->dbConnect();
        $commentEditor = $db->prepare('UPDATE comments SET comment = ?, status = "edited" WHERE id = ?');
        $commentEditor->execute(array($comment, $commentId));
        $editedComment = $commentEditor->fetch();
        return $editedComment;
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
    
    public function getCommentsCountByChapter($chapterId)
    {
        $db = $this->dbConnect();
        $commentsCount = $db->prepare('SELECT COUNT(*) FROM comments WHERE post_id= ?');
        $commentsCount->execute(array($chapterId));
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
    
    public function hideComment($commentId)
    {
        $db = $this->dbConnect();
        $editComment = $db->prepare('UPDATE comments SET status = "deleted" WHERE id = ?');
        $editComment->execute(array($commentId));
        $editedComment = $editComment->fetch();
        return $editedComment;
    }
    
    public function reportComment($commentId)
    {       
        $db = $this->dbConnect();
        $reportComment = $db->prepare('UPDATE comments SET status = "reported" WHERE id = ?');
        $reportComment->execute(array($commentId));
        $reportedComment = $reportComment->fetch();
        return $reportedComment;
    }
    
    public function unhideComment($commentId)
    {
        $db = $this->dbConnect();
        $editComment = $db->prepare('UPDATE comments SET status = NULL WHERE id = ?');
        $editComment->execute(array($commentId));
        $editedComment = $editComment->fetch();
        return $editedComment;
    }
}