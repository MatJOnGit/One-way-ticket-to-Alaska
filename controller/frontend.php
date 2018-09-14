<?php

require_once 'interfaces/ControllerInterface.php';
require_once 'Controller.php';

class Frontend_Controller extends Controller
{
    public function getChapterslist()
    {
        $this->loadManagers();
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
        $chapters = $chapterManager->getChapters();

        require('view/frontend/chaptersList.php');
    }

    public function getChapterContent()
    {
        $this->loadManagers();
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
        $commentManager = new \owtta\Blog\Model\CommentManager();

        $chapter = $chapterManager->getChapter($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require('view/frontend/chapterContent.php');
    }

    public function register()
    {
        $this->loadManagers();
        require('view/frontend/register.php');
    }

    public function signIn()
    {
        $this->loadManagers();
        require('view/frontend/signIn.php');
    }

    public function getMemberPanel()
    {
        $this->loadManagers();
        $userManager = new \owtta\Blog\Model\UserManager();
        $userInfo = $userManager->getUserInfo($_GET['id']);

        require('view/frontend/userInfo.php');
    }
}