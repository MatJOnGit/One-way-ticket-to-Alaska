<div class="book-wrapper">
    <div class="book-container">
        <div class="book-content">
            <a href="index.php?action=getChaptersList" class="white-button regular-button">
                <span>&#10094;&#10094;</span>Retour au menu des chapitres
            </a>

            <h3>Profil utilisateur</h3>
            
            <!-- user info -->
            <div class="user-info-bloc">
                
                <?php
                if (isset($userInfo['id']))
                {
                    ?>
                
                    <!-- user avatar -->
                    <div class="user-info">
                        <h4>Avatar</h4>
                        <img src="assets/img/avatars/<?php echo $userInfo['status']; ?>.jpg" alt="avatar de <?= $userInfo['pseudo'] ?>"/>
                    </div>
                    
                    <!-- user id -->
                    <div class="user-info">
                        <h4>Identifiant utilisateur</h4>
                        <div id='idContainer'>
                            <p><?= $userInfo['id'] ?></p>
                        </div>
                    </div>
                    
                    <!-- username -->
                    <div class="user-info">
                        <h4>Nom d'utilisateur</h4>
                        <div id="userName">
                            <p><?= htmlspecialchars($userInfo['pseudo']) ?></p>
                            
                            <?php
                            if ($displayableDataChecking->displayableEditionButtons === true)
                            {
                                ?>
                                <button class="edit-info-button">
                                    <i class="fas fa-edit white-item"></i>
                                </button>
                                <?php
                            }
                            ?>
                        </div>
                    </div>

                    <!-- user email -->
                    <?php
                    if ($displayableDataChecking->displayableEmail === true)
                    {
                        ?>
                        <div class="user-info">
                            <h4>Adresse mail</h4>
                            <div id="userEmail">
                                <p><?= htmlspecialchars($userInfo['email']) ?></p>
                                
                                <?php
                                if ($displayableDataChecking->displayableEditionButtons === true)
                                {
                                    ?>
                                    <button class="blue-button edit-info-button">
                                        <i class="fas fa-edit white-item"></i>
                                    </button>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <!-- user password -->
                    <?php
                    if ($displayableDataChecking->displayablePassword === true)
                    {
                        ?>
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
                    }
                    ?>
                
                    <!-- user registration date -->
                    <?php
                    if ($displayableDataChecking->displayableRegistrationDate === true)
                    {
                        ?>
                        <div class="user-info">
                            <h4>Date d'inscription</h4>
                            <p><?= $userInfo['registration_date_fr'] ?></p>
                        </div>
                        <?php
                    }
                    ?>
                    
                    <!-- user demotion/promotion/deletion -->
                    <?php
                    if ($_SESSION['status'] != 'member')
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

<script src="./assets/js/classes/Editor.js"></script>
<script src="./assets/js/classes/MemberPanelEditor.js"></script>
<script src="./assets/js/userDataInteractiveForm.js"></script>