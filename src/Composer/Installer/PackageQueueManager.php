<?php
/**
 * PackageQueueManager.php
 *
 * @package     Autoconst\Composer\Installer
 * @copyright   Copyright (C) 2025 Nickolas Burr <nickolasburr@gmail.com>
 */
declare(strict_types=1);

namespace Autoconst\Composer\Installer;

use Composer\Package\PackageInterface;
use SplQueue;
use Throwable;

final class PackageQueueManager
{
    /**
     * @var SplQueue|null $queue
     * @static
     */
    private static ?SplQueue $queue = null;

    /**
     * @return SplQueue
     * @static
     */
    public static function getQueue(): SplQueue
    {
        self::$queue ??= new SplQueue();
        return self::$queue;
    }

    /**
     * @param PackageInterface $package
     * @return void
     * @static
     */
    public static function enqueue(PackageInterface $package): void
    {
        $queue = self::getQueue();
        $queue->enqueue($package);
    }

    /**
     * @return PackageInterface|null
     * @static
     */
    public static function dequeue(): ?PackageInterface
    {
        try {
            $queue = self::getQueue();
            return $queue->dequeue();
        } catch (Throwable) {
            return null;
        }
    }
}
