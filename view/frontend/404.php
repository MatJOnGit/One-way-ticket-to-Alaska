<div class="book-wrapper">
    <div class="book-container">
        <div class="book-content">
            <button class="white-button light-blue-border">
                <a href="index.php?action=getChaptersList"><span>&#10094;&#10094;</span>Retour au menu des chapitres</a>
            </button>

            <h3>Accès refusé</h3>
            
            <div class="chapter-content">
                <p>Désolé<?php if(isset($_SESSION['pseudo'])) { echo ' ' . $_SESSION['pseudo']; } ?>, <br>Vous n'avez accès à cet espace du site.
                </p>
            </div>            
        </div>
    </div>
</div>