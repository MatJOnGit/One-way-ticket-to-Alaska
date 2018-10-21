<div class="admin-panel-wrapper">
    <div class="admin-content-container">
        <div class="admin-content">
            <h3>Création de chapitre</h3>
            <div class="chapter-wrapper">
                <form class="chapter-editing-form" action="index.php?action=uploadNewChapterContent&amp;status=saved" method="post">
                    <label for="title">Titre du chapitre <?= $_GET['id'] ?> : </label>
                    <input type="text" name="chapterTitle" id="chapter-title" required />
                    <textarea id="chapter-content" type="text" name="chapterContent"></textarea>
                    <div class="submit-buttons-block">
                        <button class="blue-button regular-button" type="submit">
                            <i class="fas fa-save white-item"></i>Enregistrer
                        </button>
                        <button class="blue-button regular-button" type="submit" formaction="index.php?action=uploadNewChapterContent&amp;status=published">
                            <i class="fas fa-globe-americas white-item"></i>Publier
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>        
</div>