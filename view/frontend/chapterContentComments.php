<?php
while ($comment = $comments->fetch())
{
?>
    <div class="comment-info">
        <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?>

        <?php
        if (($comment['status'] === 'reported') && (isset($_SESSION['status'])) && ($_SESSION['status'] === 'admin'))
        {
            ?>
            <i class="fas fa-exclamation-triangle red-item"></i>
            <?php
        }
        ?>
        </p>
        <div class="comments-commands">
            <?php
            if (isset($_SESSION['pseudo']) && ($_SESSION['status'] === 'admin')) 
            {
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
            }
            elseif (isset($_SESSION['pseudo']) && ($_SESSION['status'] === 'member'))
            {
                if (($comment['status'] === 'reported'))
                {
                    ?>
                    <a href=""><i class="fas fa-flag"></i></a>
                    <?php
                }
                elseif (is_null($comment['status']))
                {
                    ?>
                    <a href=""><i class="fas fa-flag-checkered"></i></a>
                    <?php
                }
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
?>
