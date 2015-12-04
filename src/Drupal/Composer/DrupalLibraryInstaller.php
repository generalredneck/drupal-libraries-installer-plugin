<?php

namespace Drupal\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;
use Composer\IO\IOInterface;
use Composer\Composer;

class DrupalLibraryInstaller extends LibraryInstaller
{
    public function __construct(IOInterface $io, Composer $composer)
    {
        parent::__construct($io, $composer);
        $extra = $this->composer->getPackage()->getExtra();
        $this->drupalConfig = isset($extra['drupal-libraries']) ? $extra['drupal-libraries'] : array();
        $this->drupalLibrariesPath = isset($this->drupalConfig['library-directory']) ? $this->drupalConfig['library-directory'] : 'www/sites/all/libraries/';
        if (substr($this->drupalLibrariesPath, -1) != '/') {
          $this->drupalLibrariesPath .= '/';
        }
        $this->drupalLibraries = isset($this->drupalConfig['libraries']) ? $this->drupalConfig['libraries'] : array();
        $this->drupalLibraryMap = array();
        foreach ($this->drupalLibraries as $library) {
          $this->drupalLibraryMap[$library['package']] = $library['name'];
        }
    }
    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
      if (empty($this->drupalLibraryMap[$package->getPrettyName()])) {
        $path = parent::getInstallPath($package);
      }
      else {
        $path = $this->drupalLibrariesPath . $this->drupalLibraryMap[$package->getPrettyName()];
      }
      return $path;
    }
}
