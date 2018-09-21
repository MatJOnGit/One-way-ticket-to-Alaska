<?php

namespace owtta\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($chapterId) {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, status FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($chapterId));

        return $comments;
    }
    
    public function getCommentCount() {
        $db = $this->dbConnect();
        $commentCount = $db->query('SELECT COUNT(*) FROM comments');
        $commentNumber = $commentCount->fetch();
        return $commentNumber;
    }
    
    public function getReportedCommentCount() {
        $db = $this->dbConnect();
        $commentCount = $db->query('SELECT COUNT(*) FROM comments WHERE status = "reported"');
        $commentNumber = $commentCount->fetch();
        return $commentNumber;
    }
}