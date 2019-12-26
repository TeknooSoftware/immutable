Teknoo Software - Immutable library
===================================

[![Build Status](https://travis-ci.org/TeknooSoftware/immutable.svg?branch=master)](https://travis-ci.org/TeknooSoftware/immutable) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/9db77f47-ae63-426e-96e9-8dcccf51b08f/mini.png)](https://insight.sensiolabs.com/projects/9db77f47-ae63-426e-96e9-8dcccf51b08f)

This library helps you to create immutable object by prohibiting __set and __unset calls and several call to constructor

Sample example
--------------

    $a = new class implements Teknoo\Immutable\ImmutableInterface {
        use Teknoo\Immutable\ImmutableTrait;
        
        private $values = ['foo' => 123];
        
        public function __get(string $name) 
        {
            return $this->values[$name];
        }
    }
    
    pint $a->foo; //Print 123
    $a->foo = 'bar'; //Throws an Teknoo\Immutable\Exception\ImmutableException
    unset($a->foo); //Throws an Teknoo\Immutable\Exception\ImmutableException;
    $a->__construct(); //Throws an Teknoo\Immutable\Exception\ImmutableException;

Support this project
---------------------

This project is free and will remain free, but it is developed on my personal time. 
If you like it and help me maintain it and evolve it, don't hesitate to support me on [Patreon](https://patreon.com/teknoo_software).
Thanks :) Richard. 

Installation & Requirements
---------------------------
To install this library with composer, run this command :

    composer require teknoo/immutable

This library requires :

    * PHP 7.4+

News from Teknoo Immutable 2.0
----------------------------

This library requires PHP 7.4 or newer. Some changes cause bc breaks :

- PHP 7.4 is the minimum required
- Most methods have been updated to include type hints where applicable. Please check your extension points to make sure the function signatures are correct.
- Switch to typed properties
_ All files use strict typing. Please make sure to not rely on type coercion.
- Remove some PHP useless DockBlocks
- Enable PHPStan in QA Tools and disable PHPMd


Credits
-------
Richard Déloge - <richarddeloge@gmail.com> - Lead developer.
Teknoo Software - <http://teknoo.software>

About Teknoo Software
---------------------
**Teknoo Software** is a PHP software editor, founded by Richard Déloge. 
Teknoo Software's DNA is simple : Provide to our partners and to the community a set of high quality services or software,
 sharing knowledge and skills.

License
-------
Immutable is licensed under the MIT License - see the licenses folder for details

Contribute :)
-------------

You are welcome to contribute to this project. [Fork it on Github](CONTRIBUTING.md)
