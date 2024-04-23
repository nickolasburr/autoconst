<?php
/**
 * autoload.php
 *
 * @package     Autoconst
 * @copyright   Copyright (C) 2024 Nickolas Burr <nickolasburr@gmail.com>
 */

/*
 * Composer provides $file as an unresolved file path.
 * If the containing directory is a symlink, it needs
 * to be resolved to get the real path to vendor-dir.
 */
$file ??= __FILE__;

/** @var string $dirPath */
$dirPath = dirname($file);
$dirPath = is_link($dirPath)
    ? realpath(dirname($dirPath)) : dirname($dirPath);

/** @var string $vendorDir */
$vendorDir = dirname($dirPath);

/** @var string $constFile */
$constFile = $vendorDir . '/composer/autoload_constants.php';

if (file_exists($constFile)) {
    require_once $constFile;
}
