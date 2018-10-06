<?php

namespace owtta\Blog\Model;

require_once("model/Manager.php");

class ChapterManager extends Manager
{
    public function deleteChapter($chapterId)
    {
        $db = $this->dbConnect();
        $chapterEraser = $db->prepare('DELETE FROM `chapters` WHERE id=?');
        $chapterDeletion = $chapterEraser->execute(array($chapterId));
        return $chapterDeletion;
    }
    
    public function getChapterContent($chapterId)
    {
        $db = $this->dbConnect();
        $chapterContentGetter = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, status FROM chapters WHERE id = ?');
        $chapterContentGetter->execute(array($chapterId));
        $chapterContent = $chapterContentGetter->fetch();
        return $chapterContent;
    }
    
    public function getChapterCount()
    {
        $db = $this->dbConnect();
        $chapterCount = $db->query('SELECT COUNT(*) FROM chapters');
        $chapterCount = $chapterCount->fetch();
        return $chapterCount;
    }
    
    public function getChapters()
    {
        $db = $this->dbConnect();
        $chapterList = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, status FROM chapters ORDER BY creation_date');
        return $chapterList;
    }
    
    public function getNewChapterId()
    {
        $db = $this->dbConnect();
        $newChapterId = $db->query('SELECT MAX(id) + 1 AS lastChapterId FROM chapters');
        $chapterId = $newChapterId->fetch();
        return $chapterId;
    }
    
    public function updateChapter($chapterId, $chapterContent, $chapterStatus)
    {
        $db = $this->dbConnect();
        $chapterUpdate = $db->prepare('UPDATE `chapters` SET `content`=?, `status`=? WHERE id=?');
        $chapterUpdate = $chapterUpdate->execute(array($chapterContent, $chapterStatus, $chapterId));
        return $chapterUpdate;
    }
    
    public function uploadNewChapter($chapterContent, $chapterStatus, $chapterTitle)
    {
        $db = $this->dbConnect();
        $chapterUpload = $db->prepare('INSERT INTO `chapters`(`title`, `content`, `creation_date`, `status`) VALUES (?, ?, NOW(), ?)');
        $chapterUpload = $chapterUpload->execute(array($chapterTitle, $chapterContent, $chapterStatus));
        return $chapterUpload;
    }
    
    
}