<div class="content-wrapper">
    <div class="blog-container">
        
        <button class="white-button"><a href="index.php?action=getChaptersList"><span>&#10094;&#10094;</span>Retour au menu des chapitres</a></button>
        
        <h3>Profil utilisateur :</h3>
        
        <!-- Infos utilisateur -->
        <div class="user-info-bloc">
            <div class="user-info">
                <h4>Avatar</h4>
                <div>
                    <img src="assets/img/avatars/<?= $userInfo['id'] ?>.jpg" alt="avatar de <?= $userInfo['pseudo'] ?>" />
                    <button>Editer</button>
                </div>
            </div>
            
            <div class="user-info">
                <h4>Nom d'utilisateur</h4>
                <div>
                    <p><?= $userInfo['pseudo'] ?></p>
                    <button>Editer</button>
                </div>
            </div>
            
            <div class="user-info">
                <h4>Adresse mail</h4>
                <div>
                    <p><?= $userInfo['email'] ?></p>
                    <button>Editer</button>
                </div>
            </div>
            
            <div class="user-info">
                <h4>Mot de passe</h4>
                <div>
                    <p>*******</p>
                    <button>Editer</button>
                </div>
            </div>
        </div>
    </div>
</div>