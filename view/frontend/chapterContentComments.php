<?php
while ($comment = $comments->fetch())
{
    ?>
    <div class="comment" id="comment-<?php echo $comment['id']; ?>">
        <div class="comment-info">
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?><?php if ($comment['status'] === 'reported' && isset($_SESSION['status']) && $_SESSION['status'] != 'member')
            {
                ?>
                <i class="fas fa-exclamation-triangle red-item"></i>
                <?php
            }
            ?>
            </p>
            
            <div class="comment-commands">
                <?php
                if (isset($_SESSION['pseudo']) && ($_SESSION['status'] === 'admin' || $_SESSION['status'] === 'owner' || $_SESSION['status'] === 'superadmin'))
                {
                    if (($comment['status'] === 'deleted'))
                    {
                        ?>
                        <a href="index.php?action=editCommentStatus&amp;chapterId=<?= $_GET['id'] ?>&amp;commentId=<?= $comment['id'] ?>&amp;newStatus=unhidden"><i class="fas fa-eye blue-item"></i></a>
                        <?php
                    }
                    else
                    {
                        ?>
                        <button class="edit-comment-button">
                            <i class="fas fa-edit blue-item"></i>
                        </button>
                        <a href="index.php?action=editCommentStatus&amp;chapterId=<?= $_GET['id'] ?>&amp;commentId=<?= $comment['id'] ?>&amp;newStatus=hidden"><i class="fas fa-eye-slash blue-item"></i></a>
                        <?php
                    }
                }
                elseif (isset($_SESSION['pseudo']) && ($_SESSION['status'] === 'member'))
                {
                    if (($comment['status'] === 'reported'))
                    {
                        ?>
                        <a href=""><i class="fas fa-flag blue-item"></i></a>
                        <?php
                    }
                    elseif (is_null($comment['status']))
                    {
                        ?>
                        <a href="index.php?action=reportComment&amp;chapterId=<?= $_GET['id'] ?>&commentId=<?= $comment['id'] ?>"><i class="fas fa-flag-checkered blue-item"></i></a>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        
        <div class="comment-speech">
            <?php
            if ($comment['status'] != 'deleted')
            {
                ?>
                <p class="user-comment">"<?= nl2br(htmlspecialchars($comment['comment'])) ?>"</p>
                <?php
            }
            else
            {
                ?>
                <p class="user-comment deleted-comment">Ce commentaire a été supprimé par un administrateur</p>
                <?php
            }
            
            if ($comment['status'] === 'edited')
            {
                ?>
                <p class="user-comment edited-comment">Ce commentaire a été édité par un administrateur</p>
                <?php
            }
            ?>
        </div>
    </div>
<?php
}
?>

<script src="./assets/js/classes/Editor.js"></script>
<script src="./assets/js/classes/CommentEditor.js"></script>
<script src="./assets/js/commentInteractiveForm.js"></script>