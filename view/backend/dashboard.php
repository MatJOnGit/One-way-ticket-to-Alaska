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
                    <p><span><?= $userCount[0] ?></span></p>
                    <p>membre(s)</p>
                </div>
                <div class="admin-panel-icons">
                    <i class="fas fa-users white-item"></i>
                </div>
            </div>
            <div class="grey-box">
                <div>
                    <p><span><?= $chapterCount[0] ?></span></p>
                    <p>chapitre(s)</p>
                </div>
                <div class="admin-panel-icons">
                    <i class="fas fa-book-open white-item"></i>
                </div>
            </div>
            <div class="grey-box">
                <div>
                    <div>
                        <p><span><?= $commentCount[0] ?></span> commentaire(s)</p>
                    </div>
                    <div>
                        <p><span><?= $reportedCommentCount[0] ?></span> commentaire(s) signalé(s)</p>
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
                    <?php
                    while ($data = $chapters->fetch())
                    {
                    ?>
                        <div class="chapter-options">
                            <a href="index.php?action=getChapter&amp;id=<?= $data['id'] ?>">Chapitre <?= $data['id'] ?> :<br/> <?= htmlspecialchars($data['title']) ?></a>
                            <div>
                                <a href="index.php?action=editChapter&amp;id=<?= $data['id'] ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a>
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    $chapters->closeCursor();
                    ?>
                </div>
            <button class="light-blue-button white-border">
                <a href="index.php?action=addChapter">
                    <i class="fas fa-plus"></i>
                </a>
            </button>
        </div>
    </div>
</div>
