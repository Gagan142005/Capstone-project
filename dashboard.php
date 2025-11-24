<?php
require_once 'config/database.php';
require_once 'classes/User.php';
require_once 'classes/Order.php';
require_once 'classes/Queue.php';
require_once 'classes/Equipment.php';

$user = new User();

// Check if user is logged in
if (!$user->isLoggedIn()) {
    header('Location: index.php');
    exit;
}

$userRole = $user->getRole();
$userName = $_SESSION['user_name'];
$userId = $_SESSION['user_id'];

// Initialize classes
$order = new Order();
$queue = new Queue();
$equipment = new Equipment();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - <?php echo APP_NAME; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="dashboard-container">
        <div class="welcome-section">
            <h1>Welcome, <?php echo htmlspecialchars($userName); ?>!</h1>
            <p class="role-badge role-<?php echo $userRole; ?>">
                <?php echo ucfirst($userRole); ?>
            </p>
        </div>

        <?php if ($userRole === 'customer'): ?>
            <!-- Customer Dashboard -->
            <div class="dashboard-grid">
                <div class="dashboard-card">
                    <h2>My Orders</h2>
                    <p>View and track your chemical compound orders</p>
                    <div class="card-stats">
                        <span class="stat">0 Active Orders</span>
                    </div>
                    <a href="#" class="btn btn-secondary">View Orders</a>
                </div>

                <div class="dashboard-card">
                    <h2>Submit New Order</h2>
                    <p>Submit a new chemical testing request</p>
                    <a href="create-order.php" class="btn btn-primary">New Order</a>
                </div>

                <div class="dashboard-card">
                    <h2>Order History</h2>
                    <p>View completed orders and test results</p>
                    <a href="#" class="btn btn-secondary">View History</a>
                </div>

                <div class="dashboard-card">
                    <h2>Account Settings</h2>
                    <p>Update your profile and preferences</p>
                    <a href="#" class="btn btn-secondary">Settings</a>
                </div>
            </div>

        <?php elseif ($userRole === 'technician'): ?>
            <!-- Technician Dashboard -->
            <div class="dashboard-grid">
                <div class="dashboard-card">
                    <h2>Pending Samples</h2>
                    <p>Samples waiting for preparation or testing</p>
                    <div class="card-stats">
                        <span class="stat">0 Pending</span>
                    </div>
                    <a href="#" class="btn btn-secondary">View Samples</a>
                </div>

                <div class="dashboard-card">
                    <h2>Equipment Status</h2>
                    <p>Monitor laboratory equipment availability</p>
                    <?php
                    $equipmentList = $equipment->getAllEquipment(true);
                    $availableCount = count($equipmentList);
                    ?>
                    <div class="card-stats">
                        <span class="stat"><?php echo $availableCount; ?> Available</span>
                    </div>
                    <a href="#" class="btn btn-secondary">View Equipment</a>
                </div>

                <div class="dashboard-card">
                    <h2>Processing Queue</h2>
                    <p>View and manage the sample processing queue</p>
                    <?php
                    $standardQueue = $queue->getStandardQueue();
                    $queueCount = count($standardQueue);
                    ?>
                    <div class="card-stats">
                        <span class="stat"><?php echo $queueCount; ?> in Queue</span>
                    </div>
                    <a href="#" class="btn btn-secondary">View Queue</a>
                </div>

                <div class="dashboard-card">
                    <h2>Log Delay</h2>
                    <p>Report equipment delays or issues</p>
                    <a href="#" class="btn btn-warning">Log Delay</a>
                </div>
            </div>

        <?php elseif ($userRole === 'administrator'): ?>
            <!-- Administrator Dashboard -->
            <div class="dashboard-grid">
                <div class="dashboard-card">
                    <h2>Pending Approvals</h2>
                    <p>Orders waiting for approval</p>
                    <div class="card-stats">
                        <span class="stat">0 Pending</span>
                    </div>
                    <a href="#" class="btn btn-secondary">Review Orders</a>
                </div>

                <div class="dashboard-card">
                    <h2>User Management</h2>
                    <p>Manage user accounts and permissions</p>
                    <a href="#" class="btn btn-secondary">Manage Users</a>
                </div>

                <div class="dashboard-card">
                    <h2>Equipment Management</h2>
                    <p>Configure equipment settings and schedules</p>
                    <a href="#" class="btn btn-secondary">Manage Equipment</a>
                </div>

                <div class="dashboard-card">
                    <h2>Reports & Analytics</h2>
                    <p>View system statistics and performance</p>
                    <a href="#" class="btn btn-secondary">View Reports</a>
                </div>

                <div class="dashboard-card full-width">
                    <h2>Recent Activity</h2>
                    <div class="activity-list">
                        <p>No recent activity</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- System Information Card -->
        <div class="dashboard-card system-info">
            <h3>System Information</h3>
            <p><strong>Project:</strong> Phase 3 Prototype</p>
            <p><strong>Status:</strong> Development</p>
            <p><strong>Note:</strong> This is a school project prototype demonstrating core functionality.</p>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
    <script src="js/main.js"></script>
</body>
</html>
