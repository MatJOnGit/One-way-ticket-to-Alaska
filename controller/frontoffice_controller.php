<?php

namespace owtta\controller;

class Frontoffice_controller
{
    public function getChapterslist()
    {
        $chapterManager = new \owtta\model\ChapterManager();
        $chapters = $chapterManager->getChapters();

        require('view/frontend/chaptersList.php');
    }

    public function getChapterContent()
    {
        $chapterManager = new \owtta\model\ChapterManager();
        $commentManager = new \owtta\model\CommentManager();

        $chapter = $chapterManager->getChapter($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require('view/frontend/chapterContent.php');
    }

    public function register()
    {
        require('view/frontend/register.php');
    }

    public function signIn()
    {
        require('view/frontend/signIn.php');
    }

    public function getMemberPanel()
    {
        $userManager = new \owtta\model\UserManager();
        $userInfo = $userManager->getUserInfo($_GET['id']);

        require('view/frontend/userInfo.php');
    }
}