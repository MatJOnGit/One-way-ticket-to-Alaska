<div class="admin-session-bar">
    <div>
        <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
        <label for="openSidebarMenu" class="sidebarIconToggle">
            <div class="spinner diagonal part-1"></div>
            <div class="spinner horizontal"></div>
            <div class="spinner diagonal part-2"></div>
        </label>

        <div id="sidebarMenu">
            <ul class="sidebarMenuInner">
                <li>
                    <button class="light-blue-button white-border"><a href="index.php?action=getAdminPanel">Tableau de bord</a></button>
                </li>
                <li>
                    <button class="white-button dark-blue-border"><a href="index.php">Voir mon site</a></button>
                </li>
                <li>
                    <button class="orange-button white-border"><a href="index.php">Déconnexion</a></button>
                </li>
            </ul>
        </div>
    </div>
    <p>Bienvenue sur le tableau de bord !</p>
</div>

<div class="admin-panel-wrapper">
    <div class="admin-content-container">
        <div class="admin-content">
            <h3>Edition de chapitre</h3>
            <div class="chapter-wrapper">
                <h4>Chapitre <?= $chapter['id'] ?> : <?= $chapter['title'] ?></h4>
                <form class="chapter-editing-form" action="index.php?action=updateChapterContent&amp;id=<?= $_GET['id'] ?>&amp;status=saved" method="post">
                    <textarea id="chapterContent" type="text" name="chapterContent">
                        <?= $chapter['content'] ?>
                    </textarea>
                    <div class="submit-buttons-block">
                        <button class="light-blue-button white-border" type="submit">
                            <i class="fas fa-save white-item"></i>Enregistrer
                        </button>
                        <button class="light-blue-button white-border " type="submit" formaction="index.php?action=updateChapterContent&amp;id=<?= $_GET['id'] ?>&amp;status=published">
                            <i class="fas fa-globe-americas white-item"></i>Publier
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>        
</div>