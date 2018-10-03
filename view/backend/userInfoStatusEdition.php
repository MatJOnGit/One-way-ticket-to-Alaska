<div class="user-info">
    <h4>Statut de l'utilisateur</h4>
    <div>
        <p><?php echo $userInfo['status'] ?></p>
    </div>
</div>

<div class="user-info" id="user-management">
    <?php
    if ($userInfo['status'] === 'member')
    {
        if ($_SESSION['status'] === 'owner' || $_SESSION['status'] === 'adminPrime')
        {
            ?>
            <button class="light-blue-button white-border">
                <a href="index.php?action=promoteMember&id=<?php echo $_GET['id'] ?>">
                    <i class="fas fa-user-graduate white-item"></i>
                </a>
            </button>
            <?php
        }
        ?>
        
        <button class="light-blue-button white-border">
            <a href="index.php?action=deleteMember&id=<?php echo $_GET['id'] ?>">
                 <i class="fas fa-user-alt-slash white-item"></i>
            </a>
        </button>
        <?php
    }
            
    elseif ($userInfo['status'] === 'admin')
    {
        if ($_SESSION['status'] === 'owner' || $_SESSION['status'] === 'adminPrime')
        {
            if ($_SESSION['status'] === 'adminPrime')
            {
                ?>
                <button class="light-blue-button white-border">
                    <a href="index.php?action=promoteAdmin&id=<?php echo $_GET['id'] ?>">
                        <i class="fas fa-user-graduate white-item"></i>
                    </a>
                </button>
                <?php
            }
            ?>
    
            <button class="light-blue-button white-border">
                <a href="index.php?action=demoteAdmin&id=<?php echo $_GET['id'] ?>">
                    <i class="fas fa-user-times white-item"></i>
                </a>
            </button>
            <?php
                

        }
    }
            
    elseif ($userInfo['status'] === 'owner' && $_SESSION['status'] === 'adminPrime')
    {
        ?>
        <button class="light-blue-button white-border">
            <a href="index.php?action=demoteOwner&id=<?php echo $_GET['id'] ?>">
                <i class="fas fa-user-times white-item"></i>
            </a>
        </button>
        <?php
    }
    ?>
</div>
