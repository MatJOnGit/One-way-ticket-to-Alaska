<div class="bookWrapper">
    <div class="bookContainer">
        <div class="bookContent">
            <a href="index.php?action=getChaptersList" class="whiteButton regularButton">
                <span>&#10094;&#10094;</span>Retour au menu des chapitres
            </a>
            
            <h3>Chapitre <?= $chapter['id'] ?> :<br/><?= $chapter['title'] ?></h3>
            
            <div class="chapterContent"><?= $chapter['content'] ?></div>
        </div>
    </div>
</div>

<div class="commentsWrapper">
    <div class="commentsContainer">
        <?php
        // Case 1 : Existing session
        if (isset($_SESSION['pseudo']))
        {
            if ($commentsCount['COUNT(*)'] > 0)
            {
                require 'view/frontend/chapterContentForm.php';
                require 'view/frontend/chapterContentComments.php';
            }
            else
            {
                $commentsCase = 'Session found, no comment';
                require 'view/frontend/chapterContentForm.php';
                require 'view/frontend/chapterContentUserAlert.php';
            }
        }
        else
        {
            if ($commentsCount['COUNT(*)'] > 0)
            {
                $commentsCase = 'No session, comments found';
                require 'view/frontend/chapterContentUserAlert.php';
                require 'view/frontend/chapterContentComments.php';
            }
            else
            {
                $commentsCase = 'No session, no comment';
                require 'view/frontend/chapterContentUserAlert.php';
            }
        }
        ?>
    </div>
</div>