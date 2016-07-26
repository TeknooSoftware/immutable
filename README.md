Teknoo Software - Immutable library
================================

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

Installation & Requirements
---------------------------
To install this library with composer, run this command :

    composer require teknoo/immutable

This library requires :

    * PHP 7+

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
