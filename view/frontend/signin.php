<div class='bookWrapper'>
    <div class='bookContainer'>
        <div class='bookContent'>
            <a href='index.php?action=getChaptersList' class='whiteButton regularButton'>
                <span>&#10094;&#10094;</span>Retour au menu des chapitres
            </a>
            
            <div class='formContainer'>
                <h3>Connexion</h3>
                
                <form class='identificationForm' action='index.php?action=logAccount' method='post'>
                    <div>
                        <input class='dynamicForm commentForm' type='text' name='username' id='userNameLogginInput' placeholder="Nom d'utilisateur" required>
                        <p></p>
                    </div>
                    <div>
                        <input class='dynamicForm commentForm' type='password' name='userPassword' id='userPasswordLogginInput' placeholder='Mot de passe' required>
                        <p></p>
                    </div>
                    <button class='blueButton regularButton' type='submit'>Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src='./assets/js/classes/IdentificationHelper.js'></script>
<script src='./assets/js/classes/SignInHelper.js'></script>
<script src='./assets/js/signinAlerts.js'></script>