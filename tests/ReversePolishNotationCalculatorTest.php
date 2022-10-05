<?php

namespace Tests;

use App\ReversePolishNotationCalculator;
use InvalidArgumentException;

class Solution extends TestCase
{
    private ReversePolishNotationCalculator | null $calculator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->calculator = new ReversePolishNotationCalculator();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->calculator = null;
    }

    public function test1()
    {
        $result = $this->calculator->calculate(["1", "2", "+"]);
        $this->assertEquals(1 + 2, $result);
    }

    public function test2()
    {
        $result = $this->calculator->calculate(["3", "2", "-"]);
        $this->assertEquals(3 - 2, $result);
    }

    public function test3()
    {
        $result = $this->calculator->calculate(["3", "2", "*"]);
        $this->assertEquals(3 * 2, $result);
    }

    public function test4()
    {
        $result = $this->calculator->calculate(["6", "2", "/"]);
        $this->assertEquals(6 / 2, $result);
    }

    public function test5()
    {
        $result = $this->calculator->calculate(["1", "2", "+", "2", "*"]);
        $this->assertEquals((1 + 2) * 2, $result);
    }

    public function test6()
    {
        $result = $this->calculator->calculate(["3", "5", "+", "7", "2", "-", "*"]);
        $this->assertEquals((3 + 5) * (7 - 2), $result);
    }

    public function test7()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->calculator->calculate(["1", "+"]);
    }

    public function test8()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->calculator->calculate([]);
    }

    public function test9()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->calculator->calculate(["1", "0", "/"]);
    }

    public function test10()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->calculator->calculate(["1", "foo", "+"]);
    }

    public function test11()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->calculator->calculate(["1", "1"]);
    }
}
