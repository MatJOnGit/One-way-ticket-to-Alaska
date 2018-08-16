<?php

// Chargement des classes
require_once('model/ChapterManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

function getChapterslist() {
    $chapterManager = new \owtta\Blog\Model\ChapterManager();
    $chapters = $chapterManager->getChapters();

    require('view/frontend/chaptersList.php');
}

function getChapterContent() {
    $chapterManager = new \owtta\Blog\Model\ChapterManager();
    $commentManager = new \owtta\Blog\Model\CommentManager();
    
    $chapter = $chapterManager->getChapter($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/chapterContent.php');
}

function register() {
    require('view/frontend/register.php');
}

function signIn() {
    require('view/frontend/signIn.php');
}

function getMemberPanel() {
    $userManager = new \owtta\Blog\Model\UserManager();
    $userInfo = $userManager->getUserInfo($_GET['id']);
    
    require('view/frontend/userInfo.php');
}