<?php
include_once __DIR__ . '/database.php';

function sanitizeText(string $value): string {
    return trim(strip_tags($value));
}

function sanitizeNumber(string $value): string {
    return preg_replace('/[^0-9.]/', '', $value);
}

function sanitizeAlphaText(string $value): string {
    return preg_replace('/[^A-Za-z\s\-\']/', '', trim($value));
}

function sanitizeAddress(string $value): string {
    return trim(preg_replace('/[^A-Za-z0-9\s,.-]/', '', $value));
}

function isPositiveNumber($value): bool {
    return is_numeric($value) && (float)$value >= 0;
}

function isGradeValid($value): bool {
    return is_numeric($value) && (float)$value >= 0 && (float)$value <= 100;
}

function getAgeFromDob($dob): int {
    if (empty($dob)) {
        return 0;
    }
    $dobObj = new DateTime($dob);
    $now = new DateTime();
    return $now->diff($dobObj)->y;
}
