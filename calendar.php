<?php
require_once 'config/database.php';
require_once 'classes/User.php';

$user = new User();
if (!$user->isLoggedIn()) {
    header('Location: login.php');
    exit;
}
$role = $user->getRole();
if (!in_array($role, ['administrator', 'technician'], true)) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar & Queue - <?php echo APP_NAME; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/calendar.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="calendar-container">
        <main class="calendar-content">
            <section class="calendar-header">
                <h1>Calendar & Queue</h1>
                <p class="section-desc">Scheduled orders, equipment utilization, and queue management.</p>
                <div class="calendar-toolbar">
                    <span class="calendar-status" id="calendarStatus">Loading…</span>
                    <button type="button" class="btn btn-small btn-secondary" id="btnRefresh" aria-label="Refresh">Refresh</button>
                </div>
            </section>

            <section class="queue-section">
                <h2>Queue / Timeline</h2>
                <div class="queue-legend">
                    <span class="legend-item legend-pending">Pending</span>
                    <span class="legend-item legend-inprogress">In progress</span>
                    <span class="legend-item legend-completed">Completed</span>
                </div>
                <div class="queue-list" id="queueList">
                    <p class="empty-state" id="queueEmpty">No scheduled orders.</p>
                </div>
            </section>

            <section class="utilization-section">
                <h2>Equipment utilization</h2>
                <div class="utilization-grid" id="utilizationGrid">
                    <p class="empty-state" id="utilEmpty">No equipment data.</p>
                </div>
            </section>
        </main>
    </div>

    <div class="modal-overlay" id="editModal" aria-hidden="true">
        <div class="modal" role="dialog" aria-labelledby="editModalTitle">
            <h2 id="editModalTitle">Reschedule order</h2>
            <form id="editForm">
                <input type="hidden" id="editQueueId" name="queue_id">
                <div class="form-group">
                    <label for="editStart">Scheduled start</label>
                    <input type="datetime-local" id="editStart" name="scheduled_start" required>
                </div>
                <div class="form-group">
                    <label for="editEnd">Scheduled end</label>
                    <input type="datetime-local" id="editEnd" name="scheduled_end" required>
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn btn-secondary" id="btnCancelEdit">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
    <script src="js/calendar.js"></script>
</body>
</html>
