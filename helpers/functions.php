<?php
function debug($any): void
{
    echo '<pre>';
    /** @noinspection ForgottenDebugOutputInspection */
    var_dump($any);
    echo '</pre>';
}


function showSession(bool $bool = true)
{
    if ($bool) {
        echo '<pre>';
        /** @noinspection ForgottenDebugOutputInspection */
        var_dump($_SESSION);
        echo '</pre>';
    }
}

function setActive(string $match): string
{
    return $_SESSION['path'] === $match ? 'bg-gray-900' : 'hover:bg-gray-900';
}

function queries($request): array
{
    $queries = parse_url($request, PHP_URL_QUERY);
    $arr = [];
    parse_str($queries, $arr);
    return $arr;
}

function validateFile(array $file): ?string
{
    if ($file['error'] === 0) {
        return null;
    }
    if ($file['error'] === 1 || $file['error'] === 2) {
        return 'image size is too big';
    }
    if ($file['error'] === 4) {
        return 'image is required';
    }
}