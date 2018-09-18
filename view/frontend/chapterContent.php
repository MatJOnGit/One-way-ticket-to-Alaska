<div class="book-wrapper">
    <div class="book-container">
        <div class="book-content">
            <button class="white-button light-blue-border">
                <a href="index.php?action=getChaptersList"><span>&#10094;&#10094;</span>Retour au menu des chapitres</a>
            </button>

            <h3>Chapitre <?= $chapter['id'] ?><br/><?= $chapter['title'] ?></h3>
            <div class="chapter-content"><?= $chapter['content'] ?></div>
        </div>
    </div>
</div>
    
<div class="comments-wrapper">
    <div class="comments-container">
        <form action="index.php?action=addComment&amp;id=<?= $chapter['id'] ?>" method="post">
            <textarea class="dynamic-form" id="comment" name="comment" placeholder="Ajouter un commentaire" required=""></textarea>
            <button class="light-blue-button white-border" type="submit">Valider</button>
        </form>
        <?php
        if ($comments->fetch())
        {
            while ($comment = $comments->fetch())
            {
            ?>
                <p class="comment-info"><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?> (<a href="index.php?action=editComment&amp;commentId=<?= $comment['id'] ?>&amp;postId=<?= $comment['post_id'] ?>">éditer</a>)</p>
                <p class="user-comment"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
            <?php
            }
        }
        else
        {
        ?>
            <p>Soyez le premier à commenter ce chapitre !</p>
        <?php
        }
        ?>
    </div>
</div>