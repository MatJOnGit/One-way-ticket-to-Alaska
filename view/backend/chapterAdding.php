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
                    <a href="index.php?action=getAdminPanel" class="blue-button regular-button">Tableau de bord</a>
                </li>
                <li>
                    <a href="index.php" class="white-button regular-button">Voir mon site</a>
                </li>
                <li>
                    <a href="index.php" class="orange-button regular-button">Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
    <p>Bienvenue sur le tableau de bord !</p>
</div>

<div class="admin-panel-wrapper">
    <div class="admin-content-container">
        <div class="admin-content">
            <h3>Création de chapitre</h3>
            <div class="chapter-wrapper">
                <form class="chapter-editing-form" action="index.php?action=uploadNewChapterContent&amp;status=saved" method="post">
                    <label for="title">Titre du chapitre <?= $_GET['id'] ?> : </label>
                    <input type="text" name="chapterTitle" id="chapterTitle" required />
                    <textarea id="chapterContent" type="text" name="chapterContent"></textarea>
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