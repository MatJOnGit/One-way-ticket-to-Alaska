<div class="admin-panel-wrapper">
    <div class="admin-content-container">
        <div class="admin-content">
            <h3>Vue d'ensemble</h3>
            <div>
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
                        <i class="fas fa-comments white-item"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="admin-content">
            <h3>Edition du roman</h3>
            
            <?php
            while ($chapter = $chapters->fetch())
            {
                ?>
                <div class="grey-box">
                    <div class="chapter-options">
                        <div>
                            <i class="fas fa-broadcast-tower <?php if ($chapter['status'] === 'published') { ?> green<?php } else { ?> red<?php } ?>-item"></i>
                            <a href="index.php?action=getChapter&amp;id=<?= $chapter['id'] ?>">Chapitre <?= $chapter['id'] ?> :<br/> <?= htmlspecialchars($chapter['title']) ?></a>
                        </div>
                        <div>
                            <a href="index.php?action=editChapter&amp;id=<?= $chapter['id'] ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="index.php?action=deleteChapter&amp;id=<?= $chapter['id'] ?>">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            }
            $chapters->closeCursor();
            
            if ($chapterCount['COUNT(*)'] === '0')
            {
                ?>
                <div class="grey-box">
                    <div class="chapter-options">
                        <div>
                            <p>Débutez dès à présent l'édition de votre roman ...</p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            
            <a href="index.php?action=addChapter" class="blue-button regular-button">
                <i class="fas fa-plus"></i>
            </a>
        </div>
        
        <div class="admin-content">
            <h3>Gestion d'utilisateurs</h3>
            <div class="grey-box">
                <div class="user-options">
                    <form action="index.php?action=searchMember" method="post">
                        <label for="username">Recherche un membre :</label>
                        <div class="research-form">
                            <input type="text" name="username" id="username" required />
                            <button class="blue-button regular-button" type="submit">
                                <i class="fas fa-search white-item"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>