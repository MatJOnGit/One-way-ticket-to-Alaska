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
        if ($_SESSION['status'] != 'member')
        {
            ?>
            <button class="light-blue-button white-border">
                <a href="">
                    <i class="fas fa-user-alt-slash white-item"></i>
                </a>
            </button>
            <?php
        }
        if ($_SESSION['status'] === 'owner' || $_SESSION['status'] === 'adminPrime')
        {
            ?>
            <button class="light-blue-button white-border">
                <a href="">
                    <i class="fas fa-user-graduate white-item"></i>
                </a>
            </button>
            <?php
        }
    }
    elseif ($userInfo['status'] === 'admin')
    {
        if ($_SESSION['status'] === 'owner' || $_SESSION['status'] === 'adminPrime')
        {
            ?>
            <button class="light-blue-button white-border">
                <a href="">
                    <i class="fas fa-user-times white-item"></i>
                </a>
            </button>
            <?php
        }
        elseif ($_SESSION['status'] === 'adminPrime')
        {
            ?>
            <button class="light-blue-button white-border">
                <a href="">
                    <i class="fas fa-user-graduate white-item"></i>
                </a>
            </button>
            <?php
        }
    }
    elseif ($userInfo['status'] === 'owner' && $_SESSION['status'] === 'adminPrime')
    {
        ?>
        <button class="light-blue-button white-border">
            <a href="">
                <i class="fas fa-user-times white-item"></i>
            </a>
        </button>
        <?php
    }
    ?>
    
    
</div>