<div class="book-wrapper">
    <div class="book-container">
        <div class="book-content">
            <button class="white-button">
                <a href="index.php?action=getChaptersList"><span>&#10094;&#10094;</span>Retour au menu des chapitres</a>
            </button>

            <div class="form-container">
                <h3>Inscription</h3>

                <form action="index.php?action=createAccount" method="post">
                    <input class="dynamic-form comment-form" type="text" name="user-name" id="usr_ame" placeholder="Nom d'utilisateur" required=""/>
                    <input class="dynamic-form comment-form" type="text" name="user-email" id="usr-email" placeholder="Adresse mail" required=""/>
                    <input class="dynamic-form comment-form" type="text" name="user-password" id="usr-pwd" placeholder="Mot de passe" required=""/>
                    <input class="dynamic-form comment-form" type="text" name="user-copied-password" id="usr-usr-copied-pwd" placeholder="Mot de passe (confirmation)" required=""/>
                    <button class="light-blue-button white-border" type="submit">Créer mon compte</button>
                </form>
            </div>
        </div>
    </div>
</div>