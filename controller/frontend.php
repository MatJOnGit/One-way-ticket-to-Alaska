<?php

// Chargement des classes
require_once('model/ChapterManager.php');

function listChapters() {
    $chapterManager = new \owtta\Blog\Model\ChapterManager();
    $chapters = $chapterManager->getChapters();

    require('view/frontend/chaptersList.php');
}