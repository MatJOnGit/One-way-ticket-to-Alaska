        <section>
            <h3>Chapitre <?= $chapter['id'] ?> : <?= $chapter['title'] ?></h3>
            <p><?= nl2br(htmlspecialchars($chapter['content'])) ?></p>
            
            <p>Bouton page précédente</p>
            <p>Bouton page suivante</p>

        </section>

        <form action="index.php?action=addComment&amp;id=<?= $chapter['id'] ?>" method="post">
            <div>
                <label for="author">Auteur</label><br />
                <input type="text" id="author" name="author" />
            </div>
            <div>
                <label for="comment">Commentaire</label><br />
                <textarea id="comment" name="comment"></textarea>
            </div>
            <div>
                <input type="submit" />
            </div>
        </form>

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?> (<a href="index.php?action=editComment&amp;commentId=<?= $comment['id'] ?>&amp;postId=<?= $comment['post_id'] ?>">éditer</a>)</p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <?php
        }
        ?>