Drupal Libraries Installer Plugin (For Composer)

The problem this installer tries to achieve is the ability to install libraries that Drupal modules use in the right place.

Common examples of modules that do this are:

* [WYSIWYG](https://www.drupal.org/project/wysiwyg)

In order to use this plugin add this package to your "requires" section as well as any package you wish to install as a library:

    "require": {
        "drupal/drupal-library-installer-plugin": "~0.1",
        "ckeditor/ckeditor": "~4.4.4",
    }

Then you need to tell the installer plugin where you need your libraries installed. An example may be as follows

    "extra": {
      "drupal-libraries": {
        "library-directory": "www/sites/all/libraries",
        "libraries": [
          {
            "name": "ckeditor",
            "package": "ckeditor/ckeditor"
          }
        ]
      }
    }

This will install the ckeditor library in the folder `www/sites/all/libraries/ckeditor`. Easy nuff.