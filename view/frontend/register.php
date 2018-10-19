<div class="bookWrapper">
    <div class="bookContainer">
        <div class="bookContent">
            <a href="index.php?action=getChaptersList" class="whiteButton regularButton">
                <span>&#10094;&#10094;</span>Retour au menu des chapitres
            </a>

            <div class="formContainer">
                <h3>Inscription</h3>

                <form class='identificationForm' action="index.php?action=createAccount" method="post">
                    <div>
                        <input class="dynamicForm commentForm" type="text" name="username" id="userNameLogginInput" placeholder="Nom d'utilisateur" required>
                        <p></p>
                    </div>
                    
                    <div>
                        <input class="dynamicForm commentForm" type="email" name="userEmail" id="userEmailLogginInput" placeholder="Adresse mail" required>
                        <p></p>
                    </div>
                    
                    <div>
                        <input class="dynamicForm commentForm" type="password" name="userPassword" id="userPasswordLogginInput" placeholder="Mot de passe" required>
                        <p></p>
                    </div>
                    
                    <div>
                        <input class="dynamicForm commentForm" type="password" name="userCopiedPassword" id="userCopiedPasswordLogginInput" placeholder="Mot de passe (confirmation)" required>
                        <p></p>
                    </div>
                    <button class="blueButton regularButton" type="submit">Créer mon compte</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src='./assets/js/classes/IdentificationHelper.js'></script>
<script src='./assets/js/classes/RegisterHelper.js'></script>
<script src='./assets/js/registerAlerts.js'></script>