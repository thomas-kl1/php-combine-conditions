# PHP Combine Conditions

Generic representation of conditional structure/tree library for PHP.

## Installation

What things you need to install the software and how to install them

```
Give examples
```

### Composer (recommended)

This package is available through Composer/Packagist:

```
composer require tklein/php-combine-conditions
```

### Manual

[Download](https://github.com/thomas-blackbird/php-combine-conditions/zipball/master) this repo,
or the [latest release](https://github.com/thomas-blackbird/php-combine-conditions/releases),
and put it somewhere in your project. Then do:

```php
<?php
require_once __DIR__.'/<path_where_it_has_been_extracted>/autoloader.php';
```

## Getting Started

*No documentation available yet!*

## Running the tests

*No tests available yet!*

## Contributing

Any help is welcome, feel free to raise issues and open pull requests.

### TODO List

Implement the following comparator operators:

      - array("from" => $fromValue, "to" => $toValue)
      - array("like" => $likeValue)
      - array("in" => array($inValues))
      - array("nin" => array($notInValues))
      - array("notnull" => $valueIsNotNull)
      - array("moreq" => $moreOrEqualValue)
      - array("finset" => $valueInSet)
      - array("regexp" => $regularExpression)
      - array("seq" => $stringValue)
      - array("sneq" => $stringValue)

## Authors

* **Thomas Klein** - *Initial work* - [PurpleBooth](https://github.com/thomas-blackbird)

See also the list of [contributors](https://github.com/thomas-blackbird/php-combine-conditions/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
