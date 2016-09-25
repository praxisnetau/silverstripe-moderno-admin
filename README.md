# SilverStripe Moderno Admin

#### An extensive reskin of the SilverStripe 3.1 CMS admin interface

A [SilverStripe](http://silverstripe.org) module to give the CMS a more modern, flat appearance, while endeavouring to keep with the spirit of the original look and feel.

## Requires ##

* SilverStripe 3.1 or newer

## Features ##

* site config panel with color picker fields
* resizable site tree
* Flat, modern, minimalist look and feel
* Uses [Font Awesome](http://fontawesome.io) for most icons
* Extension allowing CMS menu items to use Font Awesome icons by name
* SVG SilverStripe logo
* Reskinned TinyMCE editor
* Uses the [Google Font 'Roboto'](https://www.google.com/fonts/specimen/Roboto) for UI elements

## Installation ##

#### Composer:

```
require: "praxisnetau/silverstripe-moderno-admin": "~1.0"
```

#### Manual:

To install this module manually, clone or download the repo, copy it to your document root ensuring the folder is called `moderno-admin` and finally run a `/dev/build`.

## Usage ##

#### Resizable Site Tree:

Moderno includes a JavaScript enhancement for LeftAndMain which allows you to resize the site tree. Simply grab the right edge of the tree and drag to resize.
The width is saved using a cookie and should be persisted between page refreshes and Ajax loads.

#### Font Awesome for CMS menu items:

You can now use Font Awesome icons for your CMS menu items (e.g. ModelAdmin classes) without writing your own custom CSS.  To do this,
[find the name of the Font Awesome icon](http://fortawesome.github.io/Font-Awesome/cheatsheet) you want to use for your class, and define
the private static `$awesome_icon` on your class:

```php
private static $awesome_icon = "fa-calendar";
```

You can also define icons for classes using the YAML config system, for example:

```
MyClassName:
  awesome_icon: fa-calendar
```

The `fa-` prefix for icon names is optional, and may be safely omitted.

It's a good idea to include both the regular `$menu_icon` and `$awesome_icon` attributes for compatibility, for example:

```php
private static $menu_icon    = "mymodule/images/icons/calendar.png";
private static $awesome_icon = "fa-calendar";
```

Remember to `?flush` after adding `$awesome_icon` to your class to update the CMS interface.

## Contribution ##

This module started as a simple CSS file of tweaks that quickly got way out of hand. :( There is plenty of room for improvement if you felt inclined to do so!

## Screenshots ##

![Moderno Admin](http://i.imgur.com/kpJhZ39.png "Moderno Admin")

![Moderno Admin](http://i.imgur.com/lPbhRBj.png "Moderno Admin")

![Moderno Admin](http://i.imgur.com/WGeGbEP.png "Moderno Admin")

## To Do ##

* Skin the ugly TinyMCE popups.
* Greatly improve CSS, switch to Sass/LESS?
* Change to using SVG icons for page types?
* Replace a few more bitmap icons, e.g. search icon in dropdowns, GridField sorting icons, AssetAdmin icons, and permissions icons for Members.

## Attribution ##

* Uses some icons by [Yusuke Kamiyamane](http://p.yusukekamiyamane.com/). Licensed under a [Creative Commons Attribution 3.0 License](http://creativecommons.org/licenses/by/3.0/).
* Uses [Font Awesome](http://fontawesome.io) by [Dave Gandy](https://github.com/davegandy).
