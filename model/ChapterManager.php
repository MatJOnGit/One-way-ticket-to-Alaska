<?php

namespace owtta\Blog\Model;

require_once("model/Manager.php");

class ChapterManager extends Manager
{
    public function getChapters()
    {
        $db = $this->dbConnect();
        $chapters = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, status FROM chapters ORDER BY creation_date');
        return $chapters;
    }
    
    public function getChapter($chapterId)
    {
        $db = $this->dbConnect();
        $chapterContent = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM chapters WHERE id = ?');
        $chapterContent->execute(array($chapterId));
        $chapter = $chapterContent->fetch();
        return $chapter;
    }
    
    public function getChapterCount()
    {
        $db = $this->dbConnect();
        $chapterCount = $db->query('SELECT COUNT(*) FROM chapters');
        $chapterNumber = $chapterCount->fetch();
        return $chapterNumber;
    }
    
    public function updateChapter($chapterId, $chapterContent, $chapterStatus)
    {
        $db = $this->dbConnect();
        $chapterUpdate = $db->prepare('UPDATE `chapters` SET `content`=?, `status`=? WHERE id=?');
        $chapterUpdate = $chapterUpdate->execute(array($chapterContent, $chapterStatus, $chapterId));
        return $chapterUpdate;
    }
    
    public function getNewChapterId()
    {
        $db = $this->dbConnect();
        $newChapterId = $db->query('SELECT MAX(id) + 1 AS lastChapterId FROM chapters');
        $chapterId = $newChapterId->fetch();
        return $chapterId;
    }
    
    public function uploadNewChapter($chapterContent, $chapterStatus, $chapterTitle)
    {
        $db = $this->dbConnect();
        $chapterUpload = $db->prepare('INSERT INTO `chapters`(`title`, `content`, `creation_date`, `status`) VALUES (?, ?, NOW(), ?)');
        $chapterUpload = $chapterUpload->execute(array($chapterTitle, $chapterContent, $chapterStatus));
        return $chapterUpload;
    }
    
    public function deleteChapter($chapterId)
    {
        $db = $this->dbConnect();
        $chapterDeletion = $db->prepare('DELETE FROM `chapters` WHERE id=?');
        $chapterDeletion = $chapterDeletion->execute(array($chapterId));
        return $chapterDeletion;
    }
}