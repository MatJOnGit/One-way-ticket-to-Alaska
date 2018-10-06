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
                        <div id="avatar-container">
                            <img src="assets/img/avatars/<?php if ($userInfo['avatar_id'] != 0) { echo $userInfo['id']; } else { echo 'default'; }?>.jpg" alt="avatar de <?= $userInfo['pseudo'] ?>"/>
                            
                            <a href="" class="edit-info-button">
                                <i class="fas fa-edit white-item"></i>
                            </a>
                        </div>
                    </div>

                    <div class="user-info">
                        <h4>Nom d'utilisateur</h4>
                        <div>
                            <p><?= $userInfo['pseudo'] ?></p>
                            <a href="" class="edit-info-button">
                                <i class="fas fa-edit white-item"></i>
                            </a>
                        </div>
                    </div>

                    <div class="user-info">
                        <h4>Adresse mail</h4>
                        <div>
                            <p><?= $userInfo['email'] ?></p>
                            <a href="" class="blue-button edit-info-button">
                                <i class="fas fa-edit white-item"></i>
                            </a>
                        </div>
                    </div>

                    <div class="user-info">
                        <h4>Mot de passe</h4>
                        <div>
                            <p>*******</p>
                            
                            <a href="" class="blue-button edit-info-button">
                                <i class="fas fa-edit white-item"></i>
                            </a>
                        </div>
                    </div>
                    
                    <?php
                    if ((isset($_SESSION['status'])) && ($_SESSION['status'] === 'admin' || $_SESSION['status'] === 'owner' || $_SESSION['status'] === 'adminPrime'))
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