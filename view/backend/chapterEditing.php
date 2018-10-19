<div class="adminPanelWrapper">
    <div class="adminContentContainer">
        <div class="adminContent">
            <h3>Edition de chapitre</h3>
            <div class="chapterWrapper">
                <h4>Chapitre <?= $chapter['id'] ?> : <?= $chapter['title'] ?></h4>
                <form class="editingForm" action="index.php?action=updateChapterContent&amp;id=<?= $_GET['id'] ?>&amp;status=saved" method="post">
                    <textarea id="chapterContent" type="text" name="chapterContent">
                        <?= $chapter['content'] ?>
                    </textarea>
                    <div class="submitButtonsBlock">
                        <button class="blueButton regularButton" type="submit">
                            <i class="fas fa-save whiteItem"></i>Enregistrer
                        </button>
                        <button class="blueButton regularButton" type="submit" formaction="index.php?action=updateChapterContent&amp;id=<?= $_GET['id'] ?>&amp;status=published">
                            <i class="fas fa-globe-americas whiteItem"></i>Publier
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>