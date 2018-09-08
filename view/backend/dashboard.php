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
            <h3>Vue d'ensemble</h3>
            <div class="grey-box">
                <div>
                    <p><span>X</span></p>
                    <p>membres</p>
                </div>
                <div class="admin-panel-icons">
                    <i class="fas fa-users white-item"></i>
                </div>
            </div>
            <div class="grey-box">
                <div>
                    <p><span>X</span></p>
                    <p>chapitres</p>
                </div>
                <div class="admin-panel-icons">
                    <i class="fas fa-book-open white-item"></i>
                </div>
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
                <div class="admin-panel-icons">
                    <i class="fas fa-exclamation-triangle white-item"></i>
                </div>
            </div>
        </div>
        
        <div class="admin-content">
            <h3>Edition du roman</h3>
                <div class="grey-box">
                    <div class="chapter-options">
                        <a href="index.php?action=getChapter&amp;id=1">Chapitre 1 :<br/> Au coeur de l'Alaska</a>
                        <div>
                            <a href="index.php?action=editChapter&amp;id=1"><i class="fas fa-edit"></i></a>
                            <a>
                                <i class="fas fa-trash-alt"></i></a>
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
