<?php

namespace LogicTree\Test\Operator\Comparator;

use LogicTree\Operator\Comparator\RegexpOperator;

class RegexpOperatorTest extends \PHPUnit\Framework\TestCase
{

    public function testItMatchesExactMatch()
    {
        $this->assertTrue((new RegexpOperator())->executeComparison('toto', '/^[A-Z]+/'));
    }

}