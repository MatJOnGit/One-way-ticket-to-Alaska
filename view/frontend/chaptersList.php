<div class="content-wrapper">
    <div class="blog-container">
        <h3>Liste des chapitres</h3>
        <ul>
            <?php
            while ($data = $chapters->fetch()) {
            ?>
                <li>
                    <a href="index.php?action=getChapter&amp;id=<?= $data['id'] ?>">Chapitre <?= $data['id'] ?> : <?= htmlspecialchars($data['title']) ?></a>
                </li>
            <?php
            }
            $chapters->closeCursor();
            ?>
        </ul>
    </div>
</div>