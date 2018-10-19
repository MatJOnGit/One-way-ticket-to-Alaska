<div class="adminSessionBar">
    <div>
        <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
        <label for="openSidebarMenu" class="sidebarIconToggle">
            <div class="spinner diagonal part-1"></div>
            <div class="spinner horizontal"></div>
            <div class="spinner diagonal part-2"></div>
        </label>

        <div id="sidebarMenu">
            <ul class="sidebarMenuInner">
                <li>
                    <a href="index.php?action=getMemberPanel" class="whiteButton regularButton">Espace membre</a>
                </li>
                
                <li>
                    <a href="index.php?action=signOut" class="orangeButton regularButton">Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
    
    <p>Bienvenue<?php if (isset($_SESSION['pseudo'])) { echo ' ' . $_SESSION['pseudo']; }  ?></p>
</div>