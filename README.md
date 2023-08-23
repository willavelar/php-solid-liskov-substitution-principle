## Liskov substitution principle

This principle is the most complicated to understand, it was written by computer scientist Barbara Liskov, who summarized her principle with:

If q(x) is a demonstrable property of objects x of type T. Then q(y) must be true for objects y of type S where S is a subtype of T.

I've seen some interpretations of the Liskov substitution principle, but what I believe most to be true is that derived classes can be substituted by their base and sibling classes. In short, when we have a class B and class C that extends from class A, we should be able to exchange class B for class A, or for class C within the project without breaking the code.

Let's go to the example.
```php
<?php
class Logger
{
    public function writer($message)
    {
        //logic
    }

    public function output()
    {
        //logic
    }
}
```
```php
<?php
class DatabaseLogger extends Logger
{
    public function writer($message)
    {
        //logic
    }

    public function output()
    {
        //logic
    }
}
```
```php
<?php
class FileLogger extends Logger
{
    public function writer($message)
    {
        //logic
    }

    public function output()
    {
        throw new \Exception;
    }
}
```
```php
<?php

$logger = new FileLogger(new FileManager());
$logger->write('my log');
$logger->output();

$logger = new DatabaseLogger(new DatabaseManager());
$logger->write('my log');
$logger->output();
```

In this example we have the class *Logger*, *DatabaseLogger* and *FileLogger* the principle of substitution of Liskov says that we can use both the class *FileLogger* and *DatabaseLogger* in our application it must keep the same behavior, that's valid for any class that extends the *Logger* class.

As shown in this small example, if you use one of the functions you will have an unexpected exception that the other will not.

The right thing would be the same behavior as below
```php
<?php
class Logger
{
    public function writer($message)
    {
        //logic
    }

    public function output()
    {
        //logic
    }
}
```
```php
<?php
class DatabaseLogger extends Logger
{
    public function writer($message)
    {
        //logic
    }

    public function output()
    {
        //logic
    }
}
```
```php
<?php
class FileLogger extends Logger
{
    public function writer($message)
    {
        //logic
    }

    public function output()
    {
        //logic
    }
}
```
```php
<?php

$logger = new FileLogger(new FileManager());
$logger->write('my log');
$logger->output();

$logger = new DatabaseLogger(new DatabaseManager());
$logger->write('my log');
$logger->output();
```