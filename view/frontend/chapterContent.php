<div class="content-wrapper">
    <div class="blog-container">
        
        <button class="white-button"><a href="index.php?action=getChaptersList"><span>&#10094;&#10094;</span>Retour au menu des chapitres</a></button>
    
        <h3>Chapitre <?= $chapter['id'] ?> : <?= $chapter['title'] ?></h3>
        <p><?= nl2br(htmlspecialchars($chapter['content'])) ?></p>

        <div class="chapter-nav-buttons">
            <i class="fas fa-chevron-circle-left fa-2x"></i>
            <i class="fas fa-chevron-circle-right fa-2x"></i>
        </div>
    </div>
    
    <div class="comments-container">
        <form action="index.php?action=addComment&amp;id=<?= $chapter['id'] ?>" method="post">
            <textarea id="comment" name="comment" placeholder="Ajouter un commentaire" row="4" cols="10" required=""></textarea>
            <button class="light-blue-button white-border form-button" type="submit">Valider</button>
        </form>
        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p class="comment-info"><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?> (<a href="index.php?action=editComment&amp;commentId=<?= $comment['id'] ?>&amp;postId=<?= $comment['post_id'] ?>">éditer</a>)</p>
            <p class="user-comment"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <?php
        }
        ?>
    </div>
</div>