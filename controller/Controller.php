<?php

require_once 'interfaces/ControllerInterface.php';

class Controller implements iController
{
    public function loadManagers() {
        require_once('model/ChapterManager.php');
        require_once('model/CommentManager.php');
        require_once('model/UserManager.php');
    }

    public function getChapters() {
        $this->loadManagers();
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
        $chapters = $chapterManager->getChapters();

        return $chapters;
    }
}