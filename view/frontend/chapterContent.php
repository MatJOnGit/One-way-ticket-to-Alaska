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
        <?php
        if ($comments->fetch())
        {
            if (isset($_SESSION['pseudo']))
            {
                ?>
                <form action="index.php?action=addComment&amp;id=<?= $chapter['id'] ?>" method="post">
                    <textarea class="dynamic-form" id="comment" name="comment" placeholder="Ajouter un commentaire" required=""></textarea>
                    <button class="light-blue-button white-border" type="submit">Valider</button>
                </form>
                <?php
            }
            else
            {
                ?>
                <p>Connectez-vous si vous souhaitez commenter ce chapitre !</p>
                <?php
            }
            
            while ($comment = $comments->fetch())
            {
            ?>
                <div class="comment-info">
                    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?>
                        
                    <?php
                    if ((isset($_SESSION['pseudo'])) && ($comment['status'] === 'reported'))
                    {
                        ?>
                        <i class="fas fa-exclamation-triangle red-item"></i>
                        <?php
                    }
                    ?>
                    </p>
                    <div class="comments-commands">
                        <?php
                        if (($comment['status'] === 'deleted'))
                        {
                            ?>
                            <a href=""><i class="fas fa-eye"></i></a>
                            <?php
                        }
                        elseif (($comment['status'] === 'reported'))
                        {
                            ?>
                            <a href=""><i class="fas fa-edit"></i></a>
                            <a href=""><i class="fas fa-eye-slash"></i></a>
                            <?php
                        }
                        else
                        {
                            ?>
                            <a href=""><i class="fas fa-edit"></i></a>
                            <?php
                        }
                        ?>
                    </div>
                </div>

                <?php
                if ($comment['status'] != 'deleted')
                {
                    ?>
                    <div>
                        <p class="user-comment"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                    </div>
                    <?php
                }
                else
                {
                    ?>
                    <p class="user-comment deleted-comment">Ce commentaire a été supprimé par un administrateur</p>
                    <?php
                }
            }
        }
        elseif (isset($_SESSION['pseudo']))
        {
            ?>
            <p>Soyez le premier à commenter ce chapitre !</p>
            <?php
        }
        else
        {
            ?>
            <p>Connectez-vous pour être le premier à commenter ce chapitre !</p>
            <?php
        }
        ?>

    </div>
</div>