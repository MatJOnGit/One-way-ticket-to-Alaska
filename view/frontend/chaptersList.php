<div class="bookWrapper">
    <div class="bookContainer">
        <div class="bookContent">
            <h3>Liste des chapitres</h3>
            <ul>
                <?php
                while ($chapter = $chapters->fetch())
                {
                    if ($chapter['status'] === 'saved')
                    {
                        ?>
                        <li>
                            <a href="" class="greyButton regularButton">
                                <i class="fas fa-book-open whiteItem"></i> <?= $chapter['id'] ?> : <em>actuellement indisponible</em>
                            </a>
                            
                            <i class="fas fa-info-circle chapterHelp blueItem" title="Ce chapitre n'est pas encore disponible à la lecture. Patience est mère de vertue ;)"></i>
                        </li>
                        <?php
                    }
                    else
                    {
                        ?>
                        <li>
                            <a href="index.php?action=getChapter&amp;id=<?= $chapter['id'] ?>" class="blueButton regularButton">
                                <i class="fas fa-book-open white-item"></i> <?= $chapter['id'] ?> : <?= htmlspecialchars($chapter['title']) ?>
                            </a>
                        </li>
                        <?php
                    }
                }
                $chapters->closeCursor();
                ?>
            </ul>
        </div>
    </div>
</div>