        <section>
            <h3>Aller simple pour l'Alaska</h3>
            <ul>
                <?php
                while ($data = $chapters->fetch()) {
                ?>
                    <li>
                        <a href="blog.php?action=getChapter&amp;id=<?= $data['id'] ?>">Chapitre <?= $data['id'] ?> : <?= htmlspecialchars($data['title']) ?>
                    </li>
                <?php
                }
                $chapters->closeCursor();
                ?>
            </ul>
        </section>