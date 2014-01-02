#EvilHash
Evil hash is a small library that provides a secure hash algorithm that can be used as a drop-in replacement for MD5.
##Basic Usage
```php
require_once('evilHash.php');
$plaintext = "foo";
$hashdigest = EvilHash::hash($plaintext);
print($hashdigest);
//e7b2a48cf3290bae9b5f86f85ed1b284
```
It is suggested that you define the HMAC key, such a thing is easily done using a constant:
```php
require_once('evilHash.php');
define("EVILHASH_KEY", "ThisShouldBeAR4n|)0mzSTRNG");
$plaintext = "foo";
$hashdigest = EvilHash::hash($plaintext);
print($hashdigest);
```
or you can pass the key directly to the function, which will override the default AND the constant value:
```php
require_once('evilHash.php');
$key = "ThisShouldBeAR4n|)0mzSTRNG";
$plaintext = "foo";
$hashdigest = EvilHash::hash($plaintext, $key);
print($hashdigest);
```
finally you can also tell the hash function to run the individual hash algorithms more than once at the cost of increased CPU load
```php
require_once('evilHash.php');
$plaintext = "foo";
$key = "ThisShouldBeAR4n|)0mzSTRNG";
$numberOfIterations = 5;
$hashdigest = EvilHash::hash($plaintext, $key, $numberOfIterations);
print($hashdigest);
```
P.S. it is worth noting that you can change name of the constant that the hash function uses, as well as the default value when no key/constant is provided on lines 11 and 15 respectively.
