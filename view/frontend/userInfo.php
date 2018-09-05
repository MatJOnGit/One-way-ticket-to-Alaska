<div class="book-wrapper">
    <div class="book-container">
        <div class="book-content">
            <button class="white-button light-blue-border">
                <a href="index.php?action=getChaptersList"><span>&#10094;&#10094;</span>Retour au menu des chapitres</a>
            </button>

            <h3>Profil utilisateur</h3>

            <!-- Infos utilisateur -->
            <div class="user-info-bloc">
                <div class="user-info">
                    <h4>Avatar</h4>
                    <div id="avatar-container">
                        <img src="assets/img/avatars/<?= $userInfo['id'] ?>.jpg" alt="avatar de <?= $userInfo['pseudo'] ?>" />
                        <button class="light-blue-button white-border info-edit-button">
                            <i class="fas fa-edit white-item"></i>
                        </button>
                    </div>
                </div>

                <div class="user-info">
                    <h4>Nom d'utilisateur</h4>
                    <div>
                        <p><?= $userInfo['pseudo'] ?></p>
                        <button class="light-blue-button white-border info-edit-button">
                            <i class="fas fa-edit white-item"></i>
                        </button>
                    </div>
                </div>

                <div class="user-info">
                    <h4>Adresse mail</h4>
                    <div>
                        <p><?= $userInfo['email'] ?></p>
                        <button class="light-blue-button white-border info-edit-button">
                            <i class="fas fa-edit white-item"></i>
                        </button>
                    </div>
                </div>

                <div class="user-info">
                    <h4>Mot de passe</h4>
                    <div>
                        <p>*******</p>
                        <button class="light-blue-button white-border info-edit-button">
                            <i class="fas fa-edit white-item"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>