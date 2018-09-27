<div class="book-wrapper">
    <div class="book-container">
        <div class="book-content">
            <h3>Liste des chapitres</h3>
            <ul>
                <?php
                while ($chapter = $chapters->fetch())
                {
                    if ($chapter['status'] === 'saved')
                    {
                        ?>
                        <li>
                            <button class="grey-button white-border"><a href=""><i class="fas fa-book-open white-item"></i> <?= $chapter['id'] ?> : <em>actuellement indisponible</em></a></button>
                            <a href="" title="Ce chapitre n'est pas encore disponible à la lecture. Patience est mère de vertue ;)"><i class="fas fa-info-circle chapterInfo"></i></a>
                        </li>
                        <?php
                    }
                    else
                    {
                        ?>
                        <li>
                            <button class="light-blue-button white-border"><a href="index.php?action=getChapter&amp;id=<?= $chapter['id'] ?>"><i class="fas fa-book-open white-item"></i> <?= $chapter['id'] ?> : <?= htmlspecialchars($chapter['title']) ?></a></button>
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