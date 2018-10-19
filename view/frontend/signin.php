<div class='book-wrapper'>
    <div class='book-container'>
        <div class='book-content'>
            <a href='index.php?action=getChaptersList' class='white-button regular-button'>
                <span>&#10094;&#10094;</span>Retour au menu des chapitres
            </a>

            <div class='form-container'>
                <h3>Connexion</h3>

                <form class='identificationForm' action='index.php?action=logAccount' method='post'>
                    <div>
                        <input class='dynamic-form comment-form' type='text' name='user-name' id='userNameLogginInput' placeholder="Nom d'utilisateur" required>
                        <p></p>
                    </div>
                    <div>
                        <input class='dynamic-form comment-form' type='password' name='userPasswordLogginInput' id='userPassword' placeholder='Mot de passe' required>
                        <p></p>
                    </div>
                    <button class='blue-button regular-button' type='submit'>Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src='./assets/js/classes/IdentificationHelper.js'></script>
<script src='./assets/js/classes/SignInHelper.js'></script>
<script src='./assets/js/signinAlerts.js'></script>