<?php
require_once __DIR__ . '/../config/auth.php';
$user = currentUser();
?>
<nav class="top-navbar">
    <div class="nav-left">
        <button class="sidebar-toggle" id="sidebarToggle"><i class="fa fa-bars"></i></button>
        <div class="brand-mini">
            <i class="fa-solid fa-graduation-cap"></i> SMART SCHOOL
        </div>
    </div>
    <div class="nav-right">
        <div class="nav-icon dropdown">
            <button type="button" class="icon-button" data-toggle="dropdown">
                <i class="fa-solid fa-bell"></i>
                <span class="badge-dot">3</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">Notifications</div>
                <a class="dropdown-item" href="#"><i class="fa-solid fa-envelope"></i>New enrollment requires review.</a>
                <a class="dropdown-item" href="#"><i class="fa-solid fa-money-bill-wave"></i>Student has an outstanding balance.</a>
                <a class="dropdown-item" href="#"><i class="fa-solid fa-book"></i>3 books are overdue.</a>
            </div>
        </div>
        <div class="user-profile">
            <div class="avatar"><?php echo strtoupper(substr($user['first_name'], 0, 1)); ?></div>
            <div>
                <strong><?php echo e($user['first_name'] . ' ' . $user['last_name']); ?></strong>
                <small><?php echo e(userRoleLabel($user['role'])); ?></small>
            </div>
        </div>
    </div>
</nav>
