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