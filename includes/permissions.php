<?php
require_once __DIR__ . '/../config/auth.php';
$user = currentUser();
$role = $user['role'];

$menus = [
    'registrar' => [
        ['label' => 'Dashboard', 'url' => '/registrar/dashboard.php', 'icon' => 'fa-gauge-high'],
        ['label' => 'Students', 'url' => '/registrar/students.php', 'icon' => 'fa-user-graduate'],
        ['label' => 'Add Student', 'url' => '/registrar/student-form.php', 'icon' => 'fa-user-plus'],
        ['label' => 'Enrollment', 'url' => '/registrar/enrollment.php', 'icon' => 'fa-clipboard-list'],
        ['label' => 'Courses', 'url' => '/registrar/courses.php', 'icon' => 'fa-book-open'],
        ['label' => 'Sections', 'url' => '/registrar/sections.php', 'icon' => 'fa-school'],
        ['label' => 'Academic Year', 'url' => '/registrar/academic-years.php', 'icon' => 'fa-calendar-days'],
        ['label' => 'Reports', 'url' => '/registrar/reports.php', 'icon' => 'fa-chart-column'],
        ['label' => 'Profile', 'url' => '/registrar/profile.php', 'icon' => 'fa-user'],
        ['label' => 'Logout', 'url' => '/auth/logout.php', 'icon' => 'fa-right-from-bracket'],
    ],
    'cashier' => [
        ['label' => 'Dashboard', 'url' => '/cashier/dashboard.php', 'icon' => 'fa-gauge-high'],
        ['label' => 'Student Accounts', 'url' => '/cashier/students.php', 'icon' => 'fa-user-graduate'],
        ['label' => 'Fees', 'url' => '/cashier/fees.php', 'icon' => 'fa-file-invoice-dollar'],
        ['label' => 'Payments', 'url' => '/cashier/payments.php', 'icon' => 'fa-wallet'],
        ['label' => 'Payment History', 'url' => '/cashier/history.php', 'icon' => 'fa-receipt'],
        ['label' => 'Official Receipts', 'url' => '/cashier/receipts.php', 'icon' => 'fa-receipt'],
        ['label' => 'Reports', 'url' => '/cashier/reports.php', 'icon' => 'fa-chart-pie'],
        ['label' => 'Profile', 'url' => '/cashier/profile.php', 'icon' => 'fa-user'],
        ['label' => 'Logout', 'url' => '/auth/logout.php', 'icon' => 'fa-right-from-bracket'],
    ],
    'library' => [
        ['label' => 'Dashboard', 'url' => '/library/dashboard.php', 'icon' => 'fa-gauge-high'],
        ['label' => 'Books', 'url' => '/library/books.php', 'icon' => 'fa-book'],
        ['label' => 'Categories', 'url' => '/library/categories.php', 'icon' => 'fa-tags'],
        ['label' => 'Library Members', 'url' => '/library/members.php', 'icon' => 'fa-users'],
        ['label' => 'Borrow Book', 'url' => '/library/borrow.php', 'icon' => 'fa-hand-holding-box'],
        ['label' => 'Return Book', 'url' => '/library/returns.php', 'icon' => 'fa-rotate-left'],
        ['label' => 'Borrowing History', 'url' => '/library/history.php', 'icon' => 'fa-clock-rotate-left'],
        ['label' => 'Overdue Books', 'url' => '/library/overdue.php', 'icon' => 'fa-warning'],
        ['label' => 'Reports', 'url' => '/library/reports.php', 'icon' => 'fa-chart-bar'],
        ['label' => 'Profile', 'url' => '/library/profile.php', 'icon' => 'fa-user'],
        ['label' => 'Logout', 'url' => '/auth/logout.php', 'icon' => 'fa-right-from-bracket'],
    ],
    'attendance' => [
        ['label' => 'Dashboard', 'url' => '/attendance/dashboard.php', 'icon' => 'fa-gauge-high'],
        ['label' => 'Students', 'url' => '/attendance/students.php', 'icon' => 'fa-user-graduate'],
        ['label' => 'Daily Attendance', 'url' => '/attendance/daily.php', 'icon' => 'fa-calendar-check'],
        ['label' => 'Attendance History', 'url' => '/attendance/history.php', 'icon' => 'fa-clock'],
        ['label' => 'Absence Records', 'url' => '/attendance/absence.php', 'icon' => 'fa-user-xmark'],
        ['label' => 'Late Records', 'url' => '/attendance/late.php', 'icon' => 'fa-hourglass-half'],
        ['label' => 'Reports', 'url' => '/attendance/reports.php', 'icon' => 'fa-chart-line'],
        ['label' => 'Profile', 'url' => '/attendance/profile.php', 'icon' => 'fa-user'],
        ['label' => 'Logout', 'url' => '/auth/logout.php', 'icon' => 'fa-right-from-bracket'],
    ],
    'grading' => [
        ['label' => 'Dashboard', 'url' => '/grading/dashboard.php', 'icon' => 'fa-gauge-high'],
        ['label' => 'Students', 'url' => '/grading/students.php', 'icon' => 'fa-user-graduate'],
        ['label' => 'Subjects', 'url' => '/grading/subjects.php', 'icon' => 'fa-book'],
        ['label' => 'Classes', 'url' => '/grading/classes.php', 'icon' => 'fa-chalkboard-user'],
        ['label' => 'Enter Grades', 'url' => '/grading/grades.php', 'icon' => 'fa-clipboard-check'],
        ['label' => 'Grade History', 'url' => '/grading/history.php', 'icon' => 'fa-history'],
        ['label' => 'Student Grades', 'url' => '/grading/student-grades.php', 'icon' => 'fa-file-lines'],
        ['label' => 'Report Cards', 'url' => '/grading/report-cards.php', 'icon' => 'fa-file-contract'],
        ['label' => 'Reports', 'url' => '/grading/reports.php', 'icon' => 'fa-chart-simple'],
        ['label' => 'Profile', 'url' => '/grading/profile.php', 'icon' => 'fa-user'],
        ['label' => 'Logout', 'url' => '/auth/logout.php', 'icon' => 'fa-right-from-bracket'],
    ],
];
?>
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="logo-wrap">
            <div class="logo-icon"><i class="fa-solid fa-school"></i></div>
            <div>
                <h3>SMART SCHOOL</h3>
                <small>Management System</small>
            </div>
        </div>
    </div>
    <nav class="sidebar-menu">
        <?php foreach ($menus[$role] as $menu): ?>
            <a href="<?php echo e($menu['url']); ?>" class="menu-item <?php echo strpos($_SERVER['REQUEST_URI'], $menu['url']) !== false ? 'active' : ''; ?>">
                <i class="fa-solid <?php echo e($menu['icon']); ?>"></i>
                <span><?php echo e($menu['label']); ?></span>
            </a>
        <?php endforeach; ?>
    </nav>
</aside>
