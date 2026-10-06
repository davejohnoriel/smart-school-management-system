<?php
require_once __DIR__ . '/database.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function currentUser(): ?array {
    return $_SESSION['user'] ?? null;
}

function requireLogin(): void {
    if (!isset($_SESSION['user'])) {
        $_SESSION['error'] = 'Please log in to continue.';
        header('Location: /auth/login.php');
        exit;
    }
}

function requireRole(array $roles): void {
    $user = currentUser();
    if (!$user || !in_array($user['role'], $roles, true)) {
        http_response_code(403);
        include __DIR__ . '/../includes/403.php';
        exit;
    }
}

function e($value): string {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function setFlash(string $type, string $message): void {
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function getFlash(): ?array {
    if (!isset($_SESSION['flash'])) {
        return null;
    }

    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
    return $flash;
}

function csrfToken(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verifyCsrf(): void {
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'] ?? '', $_POST['csrf_token'])) {
        http_response_code(403);
        die('Invalid CSRF token.');
    }
}

function logActivity(int $userId, string $role, string $action, string $description): void {
    global $pdo;

    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $stmt = $pdo->prepare('INSERT INTO activity_logs (user_id, user_role, action, description, ip_address, created_at) VALUES (?, ?, ?, ?, ?, NOW())');
    $stmt->execute([$userId, $role, $action, $description, $ip]);
}

function formatCurrency(float $amount): string {
    return '₱' . number_format($amount, 2, '.', ',');
}

function formatDate(string $date): string {
    if (empty($date)) {
        return '—';
    }
    return date('M d, Y', strtotime($date));
}

function isValidPhilippineMobile(string $value): bool {
    $value = trim($value);
    return preg_match('/^(09|\+639)\d{9}$/', $value) === 1;
}

function isValidEmail(string $value): bool {
    return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
}

function userRoleLabel(string $role): string {
    $labels = [
        'registrar' => 'Registrar',
        'cashier' => 'Cashier',
        'library' => 'Library',
        'attendance' => 'Attendance',
        'grading' => 'Grading',
    ];
    return $labels[$role] ?? ucfirst($role);
}

function redirectToDashboard(): void {
    $role = currentUser()['role'];
    $map = [
        'registrar' => '/registrar/dashboard.php',
        'cashier' => '/cashier/dashboard.php',
        'library' => '/library/dashboard.php',
        'attendance' => '/attendance/dashboard.php',
        'grading' => '/grading/dashboard.php',
    ];
    header('Location: ' . ($map[$role] ?? '/index.php'));
    exit;
}
