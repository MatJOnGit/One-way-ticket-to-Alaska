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
                            <a href="" class="grey-button regular-button">
                                <i class="fas fa-book-open white-item"></i> <?= $chapter['id'] ?> : <em>actuellement indisponible</em>
                            </a>
                            
                            <i class="fas fa-info-circle chapter-help blue-item" title="Ce chapitre n'est pas encore disponible à la lecture."></i>
                        </li>
                        <?php
                    }
                    else
                    {
                        ?>
                        <li>
                            <a href="index.php?action=getChapter&amp;id=<?= $chapter['id'] ?>" class="blue-button regular-button">
                                <i class="fas fa-book-open white-item"></i> <?= $chapter['id'] ?> : <?= htmlspecialchars($chapter['title']) ?>
                            </a>
                        </li>
                        <?php
                    }
                }
                
                if ($chapterCount['COUNT(*)'] === '0')
                {
                    ?>
                    <p>Aucun chapitre n'a encore été publié par l'auteur</p>
                    <p>Revenez très bientôt pour vivre cette nouvelle aventure de Jean Forteroche...</p>
                    <?php
                }
                
                $chapters->closeCursor();
                ?>
            </ul>
        </div>
    </div>
</div>