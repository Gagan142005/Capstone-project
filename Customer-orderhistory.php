<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Order History</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

  <?php include 'includes/header.php'; ?>
  <?php include 'includes/sidebar.php'; ?>

  <div class="main-content">
    <h2>Order History</h2>
    <p>View all your submitted orders</p>

    <div class="filter-bar">
      <select>
        <option>All Status</option>
        <option>Pending</option>
        <option>Approved</option>
        <option>Completed</option>
      </select>

      <input type="text" placeholder="Search Order #">
    </div>

    <table class="data-table">
      <thead>
        <tr>
          <th>Order #</th>
          <th>Date</th>
          <th>Samples</th>
          <th>Priority</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>ORD-101</td>
          <td>2025-01-05</td>
          <td>3</td>
          <td><span class="badge high">High</span></td>
          <td><span class="badge pending">Pending</span></td>
        </tr>
        <tr>
          <td>ORD-102</td>
          <td>2025-01-08</td>
          <td>1</td>
          <td><span class="badge medium">Medium</span></td>
          <td><span class="badge completed">Completed</span></td>
        </tr>
      </tbody>
    </table>
  </div>

  <?php include 'includes/footer.php'; ?>

</body>

</html>