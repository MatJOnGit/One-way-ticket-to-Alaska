<?php

namespace owtta\Blog\Model;

require_once("model/Manager.php");

class ChapterManager extends Manager {
    public function getChapters() {
        $db = $this->dbConnect();
        $chapters = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM chapters ORDER BY creation_date');

        return $chapters;
    }
}