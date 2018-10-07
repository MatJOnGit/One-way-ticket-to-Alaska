<div class="admin-session-bar">
    <div>
        <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
        <label for="openSidebarMenu" class="sidebarIconToggle">
            <div class="spinner diagonal part-1"></div>
            <div class="spinner horizontal"></div>
            <div class="spinner diagonal part-2"></div>
        </label>

        <div id="sidebarMenu">
            <ul class="sidebarMenuInner">
                <?php
                if (isset($_GET['action']) && ($_GET['action'] != "getAdminPanel"))
                {
                    ?>
                    <li>
                        <a href="index.php?action=getAdminPanel" class="blue-button regular-button">Panneau d'administration</a>
                    </li>
                    <?php
                }
                ?>
                
                <?php
                if ($_GET['action'] != 'getAdminPanel' && $_GET['action'] != 'editChapter' && $_GET['action'] != 'createNewChapter')
                {
                    ?>
                    <li>
                        <a href="index.php?action=getMemberPanel" class="white-button regular-button">Espace membre</a>
                    </li>
                    <?php
                }
                else
                {
                    ?>
                    <li> <a href="index.php" class="white-button regular-button">Voir le site</a></li>
                    <?php
                }
                ?>
                
                
                <li>
                    <a href="index.php?action=signOut" class="orange-button regular-button">Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
    
    <?php
    if ($_GET['action'] != 'getAdminPanel' && $_GET['action'] != 'editChapter' && $_GET['action'] != 'createNewChapter')
    {
        ?>
        <p>Bienvenue<?php if (isset($_SESSION['pseudo'])) { echo ' ' . $_SESSION['pseudo']; }  ?></p>
        <?php
    }
    else
    {
        ?>
        <p>Bienvenue sur le tableau de bord !</p>
        <?php
    }
    ?>
</div>