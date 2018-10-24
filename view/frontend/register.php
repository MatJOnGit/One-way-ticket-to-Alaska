<div class="book-wrapper">
    <div class="book-container">
        <div class="book-content">
            <a href="index.php?action=getChaptersList" class="white-button regular-button">
                <span>&#10094;&#10094;</span>Retour au menu des chapitres
            </a>

            <div class="form-container">
                <h3>Inscription</h3>

                <form class='identification-form' action="index.php?action=createAccount" method="post">
                    <div>
                        <input class="dynamic-form comment-form" type="text" name="username" id="username-loggin-input" placeholder="Nom d'utilisateur" required>
                        <p></p>
                    </div>
                    
                    <div>
                        <input class="dynamic-form comment-form" type="email" name="userEmail" id="user-email-loggin-input" placeholder="Adresse mail" required>
                        <p></p>
                    </div>
                    
                    <div>
                        <input class="dynamic-form comment-form" type="password" name="userPassword" id="user-password-loggin-input" placeholder="Mot de passe" required>
                        <p></p>
                    </div>
                    
                    <div>
                        <input class="dynamic-form comment-form" type="password" name="userCopiedPassword" id="user-copied-password-loggin-input" placeholder="Mot de passe (confirmation)" required>
                        <p></p>
                    </div>
                    <button class="blue-button regular-button" type="submit">Créer mon compte</button>
                </form>
                
                <div class='grey-box'>
                    <p>Votre nom d'utilisateur doit contenir entre 5 et 20 caractères alphanumériques.</p>
                </div>
                
                <div class='grey-box'>
                    <p>Votre mot de passe doit contenir au moins une lettre en majuscule et un chiffre.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src='./assets/js/classes/IdentificationHelper.js'></script>
<script src='./assets/js/classes/RegisterHelper.js'></script>
<script src='./assets/js/registerAlerts.js'></script>