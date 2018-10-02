<div class="book-wrapper">
    <div class="book-container">
        <div class="book-content">
            <button class="white-button light-blue-border">
                <a href="index.php?action=getChaptersList"><span>&#10094;&#10094;</span>Retour au menu des chapitres</a>
            </button>

            <h3>Pas introuvable</h3>
            
            <div class="chapter-content">
                <p>Désolé<?php if(isset($_SESSION['pseudo'])) { echo ' ' . $_SESSION['pseudo']; } ?>! <br><br>La page demandée n'existe pas.
                </p>
            </div>            
        </div>
    </div>
</div>