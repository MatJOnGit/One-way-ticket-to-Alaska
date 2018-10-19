<div class="userInfo">
    <h4>Statut de l'utilisateur</h4>
    <div>
        <p><?php echo $userInfo['status'] ?></p>
    </div>
</div>

<div class="userInfo" id="userManagement">
    <?php
    if ($userInfo['status'] === 'member')
    {
        if ($_SESSION['status'] === 'owner' || $_SESSION['status'] === 'superadmin')
        {
            ?>
            <a href="index.php?action=promoteMember&id=<?php echo $_GET['id'] ?>" class="blueButton regularButton">
                <i class="fas fa-user-graduate whiteItem"></i>
            </a>
            <?php
        }
        ?>
        
        <a href="index.php?action=deleteMember&id=<?php echo $_GET['id'] ?>" class="blueButton regularButton">
            <i class="fas fa-user-alt-slash whiteItem"></i>
        </a>
        <?php
    }
            
    elseif ($userInfo['status'] === 'admin')
    {
        if ($_SESSION['status'] === 'owner' || $_SESSION['status'] === 'superadmin')
        {
            if ($_SESSION['status'] === 'superadmin')
            {
                ?>
                <a href="index.php?action=promoteAdmin&id=<?php echo $_GET['id'] ?>" class="blueButton regularButton">
                    <i class="fas fa-user-graduate whiteItem"></i>
                </a>
                <?php
            }
            ?>
            
            <a href="index.php?action=demoteAdmin&id=<?php echo $_GET['id'] ?>" class="blueButton regularButton">
                <i class="fas fa-user-times whiteItem"></i>
            </a>
        <?php
        }
    }
    
    elseif ($userInfo['status'] === 'owner' && $_SESSION['status'] === 'superadmin')
    {
        ?>
        <a href="index.php?action=demoteOwner&id=<?php echo $_GET['id'] ?>" class="blueButton regularButton">
            <i class="fas fa-user-times whiteItem"></i>
        </a>
        <?php
    }
    ?>
</div>