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
                <li>
                    <button class="light-blue-button white-border"><a href="index.php?action=getAdminPanel">Panneau d'administration</a></button>
                </li>
                <li>
                    <button class="white-button light-blue-border"><a href="index.php?action=getMemberPanel&amp;id=1">Espace membre</a></button>
                </li>
                <li>
                    <button class="orange-button white-border"><a href="index.php?action=signOut">Déconnexion</a></button>
                </li>
            </ul>
        </div>
    </div>
    <p>Bonne lecture<?php if (isset($_SESSION['name'])) { echo ', ' . $_SESSION['name']; } ?></p>
</div>