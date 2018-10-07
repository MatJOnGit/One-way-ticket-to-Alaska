<div class="admin-panel-wrapper">
    <div class="admin-content-container">
        <div class="admin-content">
            <h3>Edition de chapitre</h3>
            <div class="chapter-wrapper">
                <h4>Chapitre <?= $chapter['id'] ?> : <?= $chapter['title'] ?></h4>
                <form class="editing-form" action="index.php?action=updateChapterContent&amp;id=<?= $_GET['id'] ?>&amp;status=saved" method="post">
                    <textarea id="chapterContent" type="text" name="chapterContent">
                        <?= $chapter['content'] ?>
                    </textarea>
                    <div class="submit-buttons-block">
                        <button class="blue-button regular-button" type="submit">
                            <i class="fas fa-save white-item"></i>Enregistrer
                        </button>
                        <button class="blue-button regular-button" type="submit" formaction="index.php?action=updateChapterContent&amp;id=<?= $_GET['id'] ?>&amp;status=published">
                            <i class="fas fa-globe-americas white-item"></i>Publier
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>        
</div>