<?php
// Frontend UI only – admin view
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Order Management</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

  <?php include 'includes/header.php'; ?>
  <?php include 'includes/sidebar.php'; ?>

  <div class="main-content">
    <h2>Order Management</h2>
    <p>System-wide order history</p>

    <div class="filter-bar">
      <select>
        <option>Status</option>
        <option>Pending</option>
        <option>Approved</option>
        <option>Completed</option>
      </select>

      <select>
        <option>Priority</option>
        <option>High</option>
        <option>Medium</option>
        <option>Low</option>
      </select>

      <input type="text" placeholder="Search Customer">
    </div>

    <table class="data-table">
      <thead>
        <tr>
          <th>Order #</th>
          <th>Customer</th>
          <th>Samples</th>
          <th>Priority</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>ORD-201</td>
          <td>John Doe</td>
          <td>2</td>
          <td><span class="badge high">High</span></td>
          <td><span class="badge approved">Approved</span></td>
          <td><button class="btn">View</button></td>
        </tr>
        <tr>
          <td>ORD-202</td>
          <td>Sarah Smith</td>
          <td>1</td>
          <td><span class="badge low">Low</span></td>
          <td><span class="badge completed">Completed</span></td>
          <td><button class="btn">View</button></td>
        </tr>
      </tbody>
    </table>
  </div>

  <?php include 'includes/footer.php'; ?>

</body>

</html>