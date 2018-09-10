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
                <div>[Séries de boutons de TinyMCE]</div>
                <form>
                    <textarea type="text" name="chapter-content" rows="28">
                        <?= $chapter['content'] ?>
                    </textarea>
                </form>
            </div>
        </div>
    </div>        
</div>