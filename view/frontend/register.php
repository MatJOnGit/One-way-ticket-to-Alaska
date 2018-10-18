<div class="book-wrapper">
    <div class="book-container">
        <div class="book-content">
            <a href="index.php?action=getChaptersList" class="white-button regular-button">
                <span>&#10094;&#10094;</span>Retour au menu des chapitres
            </a>

            <div class="form-container">
                <h3>Inscription</h3>

                <form class='identificationForm' action="index.php?action=createAccount" method="post">
                    <div>
                        <input class="dynamic-form comment-form" type="text" name="user-name" id="usr_name" placeholder="Nom d'utilisateur" required>
                        <p></p>
                    </div>
                    <div>
                        <input class="dynamic-form comment-form" type="email" name="user-email" id="usr-email" placeholder="Adresse mail" required>
                        <p></p>
                    </div>
                    <div>
                        <input class="dynamic-form comment-form" type="password" name="user-password" id="usr-pwd" placeholder="Mot de passe" required>
                        <p></p>
                    </div>
                    <div>
                        <input class="dynamic-form comment-form" type="password" name="user-copied-password" id="usr-copied-pwd" placeholder="Mot de passe (confirmation)" required>
                        <p></p>
                    </div>
                    <button class="blue-button regular-button" type="submit">Créer mon compte</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src='./assets/js/classes/IdentificationHelper.js'></script>
<script src='./assets/js/classes/RegisterHelper.js'></script>
<script src='./assets/js/registerAlerts.js'></script>