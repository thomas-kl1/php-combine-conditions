# PHP Combine Conditions

[![Travis branch](https://img.shields.io/travis/thomas-blackbird/php-combine-conditions/master.svg?style=flat-square)](https://travis-ci.org/thomas-blackbird/php-combine-conditions?branch=master)
[![Codacy Badge](https://img.shields.io/codacy/grade/92a56a8e4a0d4e4b8681bbe439cf73ac/master.svg?style=flat-square)](https://app.codacy.com/app/thomas-blackbird/php-combine-conditions)
[![Coveralls github branch](https://img.shields.io/coveralls/github/thomas-blackbird/php-combine-conditions/master.svg?style=flat-square)](https://coveralls.io/github/thomas-blackbird/php-combine-conditions?branch=master)
[![Latest Stable Version](https://img.shields.io/packagist/v/tklein/php-combine-conditions/v/stable?style=flat-square)](https://packagist.org/packages/tklein/php-combine-conditions)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/tklein/php-combine-conditions.svg?style=flat-square)](https://packagist.org/packages/tklein/php-combine-conditions)
[![License: MIT](https://img.shields.io/github/license/thomas-blackbird/php-combine-conditions.svg?style=flat-square)](./LICENSE)

Generic representation of conditional structure/tree library for PHP.

## Installation

### Composer (recommended)

This package is available through Composer/Packagist:

```
composer require tklein/php-combine-conditions
```

### Manual

[Download](https://github.com/thomas-blackbird/php-combine-conditions/zipball/master) this repo,
or the [latest release](https://github.com/thomas-blackbird/php-combine-conditions/releases),
and put it somewhere in your project. Then do the following where you want to use the library:

```php
<?php
require_once __DIR__.'/<path_where_it_has_been_extracted>/autoloader.php';
```

## Getting Started

*Documentation in progress!*

### OperatorPool

What's an `OperatorPool`? It's a class which regroup the whole operator instances used in the library.  
You can register or retrieve `OperatorInterface` from this class. The goal is to use them in your combination of conditions.  
The operators are divided in two large groups:

- The comparator operator.
- The logical operator.

#### Comparator Operator

The comparator operator is used to determine the result of a boolean expression.  
*Eg:  
Does `'A'` and `'B'` are the same thing? I can test with an equality operator: `'A' == 'B'`).*

The default comparator operators are available in: `src/Operator/Comparator`.  
It's used in the `Condition` object.

#### Logical Operator

The logical operator is used to commute many boolean expression (at least two).  
*Eg:  
`'A' != 'B'` result should be the same as `'C' != 'D'`.  
I can check with the following expression `'A' != 'B' AND 'C' != 'D'`.*

The default logical operators are available in: `src/Operator/Logical`.  
It's used in the `Combine` object.

#### Override/Add new Operators

The library allows you to override the default operators and/or to provide new ones:  

- You should instantiate the `OperatorPool` class.
- Create your operators. They must implement the interface `OperatorInterface`.
- Add your operators (two available types: `logical` and `comparator`) to the `OperatorPool` object. 
- Finally, pass the `OperatorPool` object in the construct of the `ConditionManager` class.

*Eg: In the following example, we override the default comparators with ours and add a new one.*
```php
$operatorPool = new \LogicTree\Operator\OperatorPool();
  
$operatorPool->addOperator(
    \LogicTree\Operator\OperatorPool::TYPE_LOGICAL,
    \LogicTree\Operator\Logical\AndOperator::CODE,
    new \My\Class\AndOperator()
);
$operatorPool->addOperator(
    \LogicTree\Operator\OperatorPool::TYPE_COMPARATOR,
    \LogicTree\Operator\Comparator\EqOperator::CODE,
    new \My\Class\EqOperator()
);
$operatorPool->addOperator(
    \LogicTree\Operator\OperatorPool::TYPE_COMPARATOR,
    'my_custom_operator',
    new \My\Class\MyCustomOperator()
);
  
$conditionManager = new \LogicTree\Service\ConditionManager($operatorPool);
```
*Now we are able to use these comparators.*

### Condition and Combine

*Not available yet!*

## Running the tests

*No tests available yet!*

## Contributing

Any help is welcome, feel free to raise issues and open pull requests.

### TODO List

Implement the following comparator operators:

      - array("from" => $fromValue, "to" => $toValue)
      - array("like" => $likeValue)
      - array("moreq" => $moreOrEqualValue)
      - array("finset" => $valueInSet)
      - array("seq" => $stringValue)
      - array("sneq" => $stringValue)

Remove methods: condition, combine, operator...

## Authors

* **Thomas Klein** - *Initial work* - [It's me!](https://github.com/thomas-blackbird)

See also the list of [contributors](https://github.com/thomas-blackbird/php-combine-conditions/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
