<?php
declare(strict_types=1);

$root = __DIR__;
$sourceDirectory = $root . '/src/pages';
$outputDirectory = $root . '/dist';
$pages = [
    'index',
    'about',
    'bug',
    'privacy',
    'rules',
    'staff-agreement',
    'terms',
    'vote',
];
$assets = [
    'CNAME',
    'background.png',
    'index.css',
    'logo.png',
    'logo.svg',
    'page-utilities.css',
    'privacy.css',
    'style.css',
    'terms.css',
];

if (!is_dir($outputDirectory) && !mkdir($outputDirectory, 0775, true) && !is_dir($outputDirectory)) {
    throw new RuntimeException("Unable to create output directory: {$outputDirectory}");
}

foreach ($pages as $page) {
    $sourcePath = $sourceDirectory . '/' . $page . '.php';
    if (!is_file($sourcePath)) {
        throw new RuntimeException("Missing page source: {$sourcePath}");
    }

    ob_start();
    require $sourcePath;
    $html = ob_get_clean();
    if ($html === false) {
        throw new RuntimeException("Unable to render page: {$sourcePath}");
    }

    $outputPath = $outputDirectory . '/' . $page . '.html';
    if (file_put_contents($outputPath, $html, LOCK_EX) === false) {
        throw new RuntimeException("Unable to write page: {$outputPath}");
    }
}

foreach ($assets as $asset) {
    $sourcePath = $root . '/' . $asset;
    if (!is_file($sourcePath) || !copy($sourcePath, $outputDirectory . '/' . $asset)) {
        throw new RuntimeException("Unable to copy site asset: {$sourcePath}");
    }
}

echo 'Built ' . count($pages) . ' pages into dist' . PHP_EOL;
