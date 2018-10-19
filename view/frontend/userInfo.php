<div class="bookWrapper">
    <div class="bookContainer">
        <div class="bookContent">
            <a href="index.php?action=getChaptersList" class="whiteButton regularButton">
                <span>&#10094;&#10094;</span>Retour au menu des chapitres
            </a>

            <h3>Profil utilisateur</h3>
            
            <!-- user info -->
            <div class="userInfoBloc">
                
                <?php
                if (isset($userInfo['id']))
                {
                    ?>
                
                    <!-- user avatar -->
                    <div class="userInfo">
                        <h4>Avatar</h4>
                        <img src="assets/img/avatars/<?php echo $userInfo['status']; ?>.jpg" alt="avatar de <?= $userInfo['pseudo'] ?>"/>
                    </div>
                    
                    <!-- user id -->
                    <div class="userInfo">
                        <h4>Identifiant utilisateur</h4>
                        <div id='idContainer'>
                            <p><?= $userInfo['id'] ?></p>
                        </div>
                    </div>
                    
                    <!-- username -->
                    <div class="userInfo">
                        <h4>Nom d'utilisateur</h4>
                        <div id="username">
                            <p><?= htmlspecialchars($userInfo['pseudo']) ?></p>
                            
                            <?php
                            if ($displayableDataChecking->displayableEditionButtons === true)
                            {
                                ?>
                                <button class="editInfoButton">
                                    <i class="fas fa-edit whiteItem"></i>
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
                        <div class="userInfo">
                            <h4>Adresse mail</h4>
                            <div id="userEmail">
                                <p><?= htmlspecialchars($userInfo['email']) ?></p>
                                
                                <?php
                                if ($displayableDataChecking->displayableEditionButtons === true)
                                {
                                    ?>
                                    <button class="blueButton editInfoButton">
                                        <i class="fas fa-edit whiteItem"></i>
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
                        <div class="userInfo">
                            <h4>Mot de passe</h4>
                            
                            <div id="userPassword">
                                <p>*******</p>
                                <button class="blueButton editInfoButton">
                                    <i class="fas fa-edit whiteItem"></i>
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
                        <div class="userInfo">
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