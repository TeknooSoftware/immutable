Teknoo Software - Immutable library
===================================

[![Latest Stable Version](https://poser.pugx.org/teknoo/immutable/v/stable)](https://packagist.org/packages/teknoo/immutable)
[![Latest Unstable Version](https://poser.pugx.org/teknoo/immutable/v/unstable)](https://packagist.org/packages/teknoo/immutable)
[![Total Downloads](https://poser.pugx.org/teknoo/immutable/downloads)](https://packagist.org/packages/teknoo/immutable)
[![License](https://poser.pugx.org/teknoo/immutable/license)](https://packagist.org/packages/teknoo/immutable)
[![PHPStan](https://img.shields.io/badge/PHPStan-enabled-brightgreen.svg?style=flat)](https://github.com/phpstan/phpstan)

This library helps you to create immutable object by prohibiting __set and __unset calls and several call to constructor

Quick Example
-------------
    <?php
    
    declare(strict_types=1);
    
    include 'vendor/autoload.php';
    
    $a = new class implements Teknoo\Immutable\ImmutableInterface {
        use Teknoo\Immutable\ImmutableTrait;
    
        private array $values = ['foo' => 123];
    
        public function __get(string $name)
        {
            return $this->values[$name];
        }
    };
    
    //Print 123
    print $a->foo;
    //Throws an Teknoo\Immutable\Exception\ImmutableException
    $a->foo = 'bar';
    //Throws an Teknoo\Immutable\Exception\ImmutableException;
    unset($a->foo);
    //Throws an Teknoo\Immutable\Exception\ImmutableException;
    $a->__construct(); 

Support this project
---------------------
This project is free and will remain free. It is fully supported by the activities of the EIRL.
If you like it and help me maintain it and evolve it, don't hesitate to support me on
[Patreon](https://patreon.com/teknoo_software) or [Github](https://github.com/sponsors/TeknooSoftware).

Thanks :) Richard.

Credits
-------
EIRL Richard Déloge - <https://deloge.io> - Lead developer.
SASU Teknoo Software - <https://teknoo.software>

About Teknoo Software
---------------------
**Teknoo Software** is a PHP software editor, founded by Richard Déloge, as part of EIRL Richard Déloge.
Teknoo Software's goals : Provide to our partners and to the community a set of high quality services or software,
sharing knowledge and skills.

License
-------
Space is licensed under the MIT License - see the licenses folder for details.

Installation & Requirements
---------------------------
To install this library with composer, run this command :

    composer require teknoo/immutable

This library requires :

    * PHP 8.1+

News from Teknoo Immutable 3.0
------------------------------
This library requires PHP 8.1 or newer. Some changes cause bc breaks :

- Switch to readonly property to detect reconstructed object

News from Teknoo Immutable 2.0
------------------------------
This library requires PHP 7.4 or newer. Some changes cause bc breaks :

- PHP 7.4 is the minimum required
- Most methods have been updated to include type hints where applicable. Please check your extension points to make sure the function signatures are correct.
- Switch to typed properties
_ All files use strict typing. Please make sure to not rely on type coercion.
- Remove some PHP useless DockBlocks
- Enable PHPStan in QA Tools and disable PHPMd

Contribute :)
-------------
You are welcome to contribute to this project. [Fork it on Github](CONTRIBUTING.md)
