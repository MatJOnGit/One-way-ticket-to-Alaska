<div class="admin-session-bar">
    <div>
        <input type="checkbox" class="open-sidebar-menu" id="open-sidebar-menu">
        <label for="openSidebarMenu" class="sidebar-icon-toggle">
            <div class="spinner diagonal part-1"></div>
            <div class="spinner horizontal"></div>
            <div class="spinner diagonal part-2"></div>
        </label>

        <div id="sidebar-menu">
            <ul class="sidebar-menu-inner">
                <li>
                    <a href="index.php?action=getMemberPanel" class="white-button regular-button">Espace membre</a>
                </li>
                
                <li>
                    <a href="index.php?action=signOut" class="orange-button regular-button">Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
    
    <p>Bienvenue<?php if (isset($_SESSION['pseudo'])) { echo ' ' . htmlspecialchars($_SESSION['pseudo']); }  ?></p>
</div>