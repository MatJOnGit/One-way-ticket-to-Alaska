<div class="adminPanelWrapper">
    <div class="adminContentContainer">
        <div class="adminContent">
            <h3>Création de chapitre</h3>
            <div class="chapterWrapper">
                <form class="chapterEditingForm" action="index.php?action=uploadNewChapterContent&amp;status=saved" method="post">
                    <label for="title">Titre du chapitre <?= $_GET['id'] ?> : </label>
                    <input type="text" name="chapterTitle" id="chapterTitle" required />
                    <textarea id="chapterContent" type="text" name="chapterContent"></textarea>
                    <div class="submitButtonsBlock">
                        <button class="blueButton regularButton" type="submit">
                            <i class="fas fa-save white-item"></i>Enregistrer
                        </button>
                        <button class="blueButton regularButton" type="submit" formaction="index.php?action=uploadNewChapterContent&amp;status=published">
                            <i class="fas fa-globe-americas whiteItem"></i>Publier
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>        
</div>