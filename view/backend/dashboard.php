<div class="admin-session-bar">
    <p>Bienvenue sur le tableau de bord !</p>
    <nav>
        <button class="white-button dark-blue-border"><a href="index.php">Voir mon site</a></button>
        <button class="orange-button white-border"><a href="index.php">Déconnexion</a></button>
    </nav>
</div>

<div class="admin-panel-wrapper">
    <div class="admin-content-container">
        <div class="admin-content">
            <h3>Vue d'ensemble</h3>
            <div class="grey-box">
                <div>
                    <p><span>X</span></p>
                    <p>membres</p>
                </div>
                <i class="fas fa-users"></i>
            </div>
            <div class="grey-box">
                <div>
                    <p><span>X</span></p>
                    <p>chapitres</p>
                </div>
                <i class="fas fa-book-open"></i>                
            </div>
            <div class="grey-box">
                <div>
                    <div>
                        <p><span>X</span> commentaires</p>
                    </div>
                    <div>
                        <p><span>Y</span> commentaires signalés</p>
                    </div>
                </div>
                <i class="fas fa-exclamation-triangle"></i>               
            </div>
        </div>
        
        <div class="admin-content">
            <h3>Edition du roman</h3>
                <div class="grey-box">
                    <div class="chapter-options">
                        <a href="index.php?action=getChapter&amp;id=1">Chapitre 1 :<br/> Au coeur de l'Alaska</a>
                        <div>
                            <a href="index.php?action=editChapter&amp;id=1"><i class="fas fa-edit"></i></a>
                            <a><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </div>
                    <div class="chapter-options">
                        <a href="index.php?action=getChapter&amp;id=2">Chapitre 2 :<br/> La piste Stampede</a>
                        <div>
                            <a href="index.php?action=editChapter&amp;id=2"><i class="fas fa-edit"></i></a>
                            <a><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </div>
                </div>
            <button class="light-blue-button white-border">
                <a href="">
                    <i class="fas fa-plus"></i>
                </a>
            </button>
        </div>
    </div>
</div>
