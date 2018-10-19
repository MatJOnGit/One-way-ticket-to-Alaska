<div class="adminPanelWrapper">
    <div class="adminContentContainer">
        <div class="adminContent">
            <h3>Vue d'ensemble</h3>
            <div class="greyBox">
                <div>
                    <p><span><?= $userCount[0] ?></span></p>
                    <p>membre(s)</p>
                </div>
                
                <div class="adminPanelIcons">
                    <i class="fas fa-users whiteItem"></i>
                </div>
            </div>
            
            <div class="greyBox">
                <div>
                    <p><span><?= $chapterCount[0] ?></span></p>
                    <p>chapitre(s)</p>
                </div>
                <div class="adminPanelIcons">
                    <i class="fas fa-book-open whiteItem"></i>
                </div>
            </div>
            
            <div class="greyBox">
                <div>
                    <div>
                        <p><span><?= $commentCount[0] ?></span> commentaire(s)</p>
                    </div>
                    <div>
                        <p><span><?= $reportedCommentCount[0] ?></span> commentaire(s) signalé(s)</p>
                    </div>
                </div>
                <div class="adminPanelIcons">
                    <i class="fas fa-comments whiteItem"></i>
                </div>
            </div>
        </div>
        
        <div class="adminContent">
            <h3>Edition du roman</h3>
            
            <?php
            while ($chapter = $chapters->fetch())
            {
                ?>
                <div class="greyBox">
                    <div class="chapterOptions">
                        <div>
                            <i class="fas fa-broadcast-tower <?php if ($chapter['status'] === 'published') { ?> green<?php } else { ?> red<?php } ?>Item"></i>
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
            ?>
            
            <a href="index.php?action=addChapter" class="blueButton regularButton">
                <i class="fas fa-plus"></i>
            </a>
        </div>
        
        <div class="adminContent">
            <h3>Gestion d'utilisateurs</h3>
            <div class="greyBox">
                <div class="usersOptions">
                    <form action="index.php?action=searchMember" method="post">
                        <label for="username">Recherche un membre :</label>
                        <div class="researchForm">
                            <input type="text" name="username" id="username" required />
                            <button class="blueButton regularButton" type="submit">
                                <i class="fas fa-search whiteItem"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>