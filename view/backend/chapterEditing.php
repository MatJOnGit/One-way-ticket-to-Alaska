<div class="admin-wrapper">
    <div class="admin-session-bar">
        <p>Bienvenue sur le tableau de bord !</p>
        <nav>
            <button class="dark-blue-button white-border"><a href="index.php?action=getAdminPanel">Tableau de bord</a></button>
            <button class="white-button dark-blue-border"><a href="index.php">Voir mon site</a></button>
            <button class="orange-button white-border"><a href="index.php">Déconnexion</a></button>
        </nav>
    </div>
    
    <div class="admin-content-wrapper">
        <div class="admin-content">
            <h3>Edition de chapitre</h3>
            <div class="chapter-wrapper">
                <h4>Chapitre <?= $chapter['id'] ?> : <?= $chapter['title'] ?></h4>
                <div>[Séries de boutons de TinyMCE]</div>
                <form>
                    <input type="text" name="chapter-content" value="<?= nl2br(htmlspecialchars($chapter['content'])) ?>" />
                </form>
            </div>
        </div>        
    </div>
</div>