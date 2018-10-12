<div class="book-wrapper">
    <div class="book-container">
        <div class="book-content">
            <a href="index.php?action=getChaptersList" class="white-button regular-button">
                <span>&#10094;&#10094;</span>Retour au menu des chapitres
            </a>

            <h3>Profil utilisateur</h3>
            
            <!-- Infos utilisateur -->
            <div class="user-info-bloc">
                
                <?php
                if (isset($userInfo['id']))
                {
                    ?>
                    <div class="user-info">
                        <h4>Avatar</h4>
                        <img src="assets/img/avatars/<?php echo $userInfo['status']; ?>.jpg" alt="avatar de <?= $userInfo['pseudo'] ?>"/>
                    </div>
                
                    <div class="user-info">
                        <h4>Identifiant utilisateur</h4>
                        <div id='idContainer'>
                            <p><?= $userInfo['id'] ?></p>
                        </div>
                    </div>
                
                    <div class="user-info">
                        <h4>Nom d'utilisateur</h4>
                        <div id="userName">
                            <p><?= $userInfo['pseudo'] ?></p>
                            <button class="edit-info-button">
                                <i class="fas fa-edit white-item"></i>
                            </button>
                        </div>
                    </div>

                    <div class="user-info">
                        <h4>Adresse mail</h4>
                        <div id="userEmail">
                            <p><?= $userInfo['email'] ?></p>
                            <button class="blue-button edit-info-button">
                                <i class="fas fa-edit white-item"></i>
                            </button>
                        </div>
                    </div>

                    <div class="user-info">
                        <h4>Mot de passe</h4>
                        <div id="userPwd">
                            <p>*******</p>
                            
                            <button class="blue-button edit-info-button">
                                <i class="fas fa-edit white-item"></i>
                            </button>
                        </div>
                    </div>
                    
                    <?php
                    if ((isset($_SESSION['status'])) && ($_SESSION['status'] === 'admin' || $_SESSION['status'] === 'owner' || $_SESSION['status'] === 'superadmin'))
                    {
                        require 'view/backend/userInfoStatusEdition.php';
                    }
                }
                else
                {
                    echo 'L\'utilisateur n\'existe pas en bdd';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script src="./assets/js/MemberPanelForm.js"></script>
<script src="./assets/js/userDataEditor.js"></script>