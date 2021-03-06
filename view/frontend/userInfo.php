<div class="book-wrapper">
    <div class="book-container">
        <div class="book-content">
            <a href="index.php?action=getChaptersList" class="white-button regular-button">
                <span>&#10094;&#10094;</span>Retour au menu des chapitres
            </a>

            <h3>Profil utilisateur</h3>
            
            <div class="user-info-block">
                <div>
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
                            <div id='id-container'>
                                <p><?= $userInfo['id'] ?></p>
                            </div>
                        </div>

                        <div class="user-info">
                            <h4>Nom d'utilisateur</h4>
                            <div id="username">
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

                        <?php
                        if ($displayableDataChecking->displayableEmail === true)
                        {
                            ?>
                            <div class="user-info">
                                <h4>Adresse mail</h4>
                                <div id="user-email">
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

                        <?php
                        if ($displayableDataChecking->displayablePassword === true)
                        {
                            ?>
                            <div class="user-info">
                                <h4>Mot de passe</h4>

                                <div id="user-password">
                                    <p>*******</p>
                                    <button class="blue-button edit-info-button">
                                        <i class="fas fa-edit white-item"></i>
                                    </button>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

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
</div>

<script src="./assets/js/classes/Editor.js"></script>
<script src="./assets/js/classes/UserDataEditor.js"></script>
<script src="./assets/js/userDataEdition.js"></script>