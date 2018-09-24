<?php
switch ($commentsCase) {
    case 'Session found, no comment' :
        
        ?>
        <p>Soyez le premier à commenter ce chapitre !</p>
        <?php
        break;
        
    case 'No session, comments found' :
        
        ?>
        <p>Connectez-vous si vous souhaitez vous aussi commenter ce chapitre !</p>
        <?php
        break;
        
    case 'No session, no comment' :
        
        ?>
        <p>Connectez-vous pour être le premier à commenter ce chapitre !</p>
        <?php
        break;
}
?>