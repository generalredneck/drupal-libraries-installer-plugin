<?php

namespace Drupal\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class DrupalLibraryInstaller extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getPackageBasePath(PackageInterface $package)
    {
        var_dump($this->composer->getConfig());
        return 'data/templates/'.substr($package->getPrettyName(), 23);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'phpdocumentor-template' === $packageType;
    }
}