<header class="main-header">
    <div class="header-content">
        <div class="logo">
            <a href="dashboard.php"><?php echo APP_NAME; ?></a>
        </div>
        
        <nav class="main-nav">
            <?php if (isset($_SESSION['user_role'])): ?>
                <?php if ($_SESSION['user_role'] === 'customer'): ?>
                    <a href="dashboard.php">Dashboard</a>
                    <a href="#">My Orders</a>
                    <a href="create-order.php">New Order</a>
                <?php elseif ($_SESSION['user_role'] === 'technician'): ?>
                    <a href="dashboard.php">Dashboard</a>
                    <a href="#">Samples</a>
                    <a href="#">Equipment</a>
                    <a href="#">Queue</a>
                <?php elseif ($_SESSION['user_role'] === 'administrator'): ?>
                    <a href="dashboard.php">Dashboard</a>
                    <a href="admin.php?tab=approvals">Approvals</a>
                    <a href="admin.php?tab=users">Users</a>
                    <a href="admin.php?tab=equipment">Equipment</a>
                    <a href="admin.php?tab=reports">Reports</a>
                <?php endif; ?>
            <?php endif; ?>
        </nav>

        <div class="user-menu">
            <?php if (isset($_SESSION['user_id'])): ?>
                <?php if (isset($_SESSION['user_name'])): ?>
                    <span class="user-name"><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                <?php endif; ?>
                <a href="logout.php" class="btn btn-small">Logout</a>
            <?php endif; ?>
        </div>
    </div>
</header>
