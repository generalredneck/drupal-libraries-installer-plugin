<?php

namespace Drupal\Composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class DrupalLibraryInstallerPlugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new DrupalLibraryInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}