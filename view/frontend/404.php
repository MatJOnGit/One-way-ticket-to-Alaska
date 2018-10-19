<div class="bookWrapper">
    <div class="bookContainer">
        <div class="bookContent">
            <a href="index.php?action=getChaptersList" class="whiteButton regularButton">
                <span>&#10094;&#10094;</span>Retour au menu des chapitres
            </a>
            
            <h3>Contenu introuvable</h3>
            
            <div class="chapterContent">
                <p>Désolé<?php if(isset($_SESSION['pseudo'])) { echo ' ' . $_SESSION['pseudo']; } ?>! <br><br>La page demandée n'existe pas.</p>
            </div>
        </div>
    </div>
</div>