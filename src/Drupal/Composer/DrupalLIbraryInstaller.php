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
        //var_dump($this->composer->getConfig());
        var_dump($this->composer->getExtra());
        return parent::getPackageBasePath($package);
    }

}