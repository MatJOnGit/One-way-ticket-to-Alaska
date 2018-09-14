<div class="book-wrapper">
    <div class="book-container">
        <div class="book-content">
            <h3>Liste des chapitres</h3>
            <ul>
                <?php
                while ($data = $chapters->fetch())
                {
                ?>
                    <li>
                        <button class="light-blue-button white-border"><a href="index.php?action=getChapter&amp;id=<?= $data['id'] ?>"><i class="fas fa-book-open white-item"></i> <?= $data['id'] ?> : <?= htmlspecialchars($data['title']) ?></a></button>
                    </li>
                <?php
                }
                $chapters->closeCursor();
                ?>
            </ul>
        </div>
    </div>
</div>