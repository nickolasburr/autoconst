<?php
/**
 * PackageInstallPlugin.php
 *
 * @package     Autoconst\Composer\Plugin
 * @copyright   Copyright (C) 2025 Nickolas Burr <nickolasburr@gmail.com>
 */
declare(strict_types=1);

namespace Autoconst\Composer\Plugin;

use Autoconst\Composer\Installer\PackageQueueManager;
use Composer\Composer;
use Composer\EventDispatcher\Event;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Package\PackageInterface;
use Composer\Plugin\PluginInterface;

use const PHP_INT_MAX;

final class PackageInstallPlugin implements PluginInterface, EventSubscriberInterface
{
    /**
     * {@inheritdoc}
     */
    public function activate(
        Composer $composer,
        IOInterface $io
    ) {}

    /**
     * {@inheritdoc}
     */
    public function deactivate(
        Composer $composer,
        IOInterface $io
    ) {}

    /**
     * @param Event $event
     * @return void
     */
    public function install(Event $event)
    {
        /** @var PackageInterface $package */
        $package = $event->getOperation()->getPackage();
        PackageQueueManager::enqueue($package);
    }

    /**
     * {@inheritdoc}
     */
    public function uninstall(
        Composer $composer,
        IOInterface $io
    ) {}

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'post-package-install' => ['install', PHP_INT_MAX],
            'post-package-update' => ['install', PHP_INT_MAX],
        ];
    }
}
