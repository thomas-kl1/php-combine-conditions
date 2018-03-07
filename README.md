# PHP Combine Conditions

[![Travis branch](https://img.shields.io/travis/thomas-blackbird/php-combine-conditions/master.svg?style=flat-square)](https://travis-ci.org/thomas-blackbird/php-combine-conditions?branch=master)
[![Codacy Badge](https://img.shields.io/codacy/grade/92a56a8e4a0d4e4b8681bbe439cf73ac/master.svg?style=flat-square)](https://app.codacy.com/app/thomas-blackbird/php-combine-conditions)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/thomas-blackbird/php-combine-conditions/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/thomas-blackbird/php-combine-conditions/?branch=master)
[![Coveralls github branch](https://img.shields.io/coveralls/github/thomas-blackbird/php-combine-conditions/master.svg?style=flat-square)](https://coveralls.io/github/thomas-blackbird/php-combine-conditions?branch=master)
[![Latest Stable Version](https://img.shields.io/packagist/v/tklein/php-combine-conditions.svg?style=flat-square)](https://packagist.org/packages/tklein/php-combine-conditions)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/tklein/php-combine-conditions.svg?style=flat-square)](https://packagist.org/packages/tklein/php-combine-conditions)
[![License: MIT](https://img.shields.io/github/license/thomas-blackbird/php-combine-conditions.svg?style=flat-square)](./LICENSE)

Generic representation of conditional structure/tree library for PHP.

 - [Installation](#installation)
 - [Getting Started](#getting-started)
   - [Main Library Entrance](#main-library-entrance)
   - [OperatorPool](#operatorpool)
     - [Comparator Operator](#comparator-operator)
     - [Logical Operator](#logical-operator)
     - [Override/Add new Operators](#override/add-new-operators)
   - [Condition and Combine](#condition-and-combine)
     - [Condition](#condition)
     - [Combine](#combine)
   - [Execute the Combine Conditions](#execute-the-combine-conditions)
   - [Export the Combine Conditions to Format](#export-the-combine-conditions-to-format)
 - [Examples](#examples)
 - [Running the tests](#running-the-tests)
 - [Contributing](#contributing)
 - [Authors](#authors)
 - [License](#license)

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

The combine conditions library for PHP is a tool which helps you to build dynamically structured (as tree or graph) conditions.  
These conditions are able to be combined and customized operators can be provided.  
This library can be used in many context, to execute advanced combination of conditions, to generate some complex SQL
conditions, or to be exported to multiple formats as JSON, XML, FULLTEXT...  
An other case to use this library is to execute and process frontend conditional tree (Eg: a user build his conditional
tree and would like to process the result).

The library has been written in order to allows you to implement it to the right way you want. So, if you implement the
interfaces from the public API, you can build your own combine conditions structure and continue to execute it via the public
API services.

The library is written to follow the PSR1/PSR2 coding standards.

### Main Library Entrance

For a simply use, you'll only need to use the following class: `\LogicTree\LogicTreeFacade`.  
This class allows you to use the mainly features of the library, as to build a combined conditions, to execute somes, and
exports them.

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
It's used in the `ConditionInterface` definition, known as the `Condition` object.

#### Logical Operator

The logical operator is used to commute many boolean expression (at least two).  
*Eg:  
`'A' != 'B'` result should be the same as `'C' != 'D'`.  
I can check with the following expression `'A' != 'B' AND 'C' != 'D'`.*

The default logical operators are available in: `src/Operator/Logical`.  
It's used in the `CombineInterface` definition, known as the `Combine` object.

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
Now we are able to use these operators in our code and are availables everywhere in the library.

### Condition and Combine

These class always implement the `NodeInterface`. It represent the base model of the library.  
Because of the composition pattern, you may want to know if the current object is the root or a node, you
should use the following methods:

- `hasParent()` : check if the current object has parent or not.
- `getParent()` : retrieve the current object's parent.
- `ConditionInterface` : is an instance of, represent the last/final node.
- `CombineInterface` : is an instance of, represent the container node.

#### Condition

`ConditionInterface`: it represents an expression with a comparator operator.  
The interface is: `\LogicTree\Model\ConditionInterface`.  
The concrete default class is: `\LogicTree\Model\Condition`.  
It requires a mixed value to compared by an operator to a value from the data source.

The operator is a `string` which is the code of the wanted operator.
The first value is a `string` which is the identifier of the value from the `DataSource` object.  
The value to compare must be a `mixed` value.

#### Combine

`Combine`: it represents an expression with a logical operator.  
The interface is: `\LogicTree\Model\CombineInterface`.
The concrete default class is: `\LogicTree\Model\Combine`.  
It requires at least two conditions and/or combines to commute with a logical operator.

The operator is a `string` which is the code of the wanted operator.  
The conditions/combine must be an instance of `ConditionInterface`.    

You can add a `NodeInterface` to the `CombineInterface` with the following methods:

- `addChild(NodeInterface $node)` : add a new node child to the parent node object. 
- `setChildren(array $nodes)` : replace the children by the new ones.

If you want to invert the result of the combination of conditions, you can specify to the `CombineInterface`
object that the result should actually be inverted:

- `setIsInvert(bool $isInvert)`.

### Execute the Combine Conditions

In order to execute the combined conditions, you must use the `\LogicTree\Service\ConditionManager` class.  
This service allows to perform many actions on your `NodeInterface` object.  
*Actually only the `execute` method is available from the public API.*  
Anyway, the `execute` method allows you to determine the final result of your combination of conditions.

### Export the Combine Conditions to Format

*No documentation available yet!* 

## Examples

Examples of code usage cases are available in this [file](./examples/index.php).

## Running the tests

The tests are placed in the `tests` directory, at the root of the library.  

*No tests available yet!*

## Contributing

Any help is welcome, feel free to raise issues or to open pull requests. Further details in the [CONTRIBUTING.md](.github/CONTRIBUTING.md).

### TODO List

Implement the following comparator operators:

      - array("from" => $fromValue, "to" => $toValue)
      - array("like" => $likeValue)
      - array("moreq" => $moreOrEqualValue)
      - array("finset" => $valueInSet)
      - array("seq" => $stringValue)
      - array("sneq" => $stringValue)

ToString methods, in order to render the combine conditions in full text / different formats.  
Have to: AdapterPool (toFormat) - ConverterPool (getSymbol, getExpression, getFullExpression).  
Possibility to add custom type node and process them in the services.  
Study Namespace and Lib Name: [trends](https://trends.google.fr/trends/explore?q=filter%20criteria,group%20conditions,complex%20conditions)

Add tests and examples: from scratch, with and without new operators, and execution (with expected results).   

## Authors

* **Thomas Klein** - *Initial work* - [It's me!](https://github.com/thomas-blackbird)

See also the list of [contributors](https://github.com/thomas-blackbird/php-combine-conditions/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
