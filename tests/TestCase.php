<?php

namespace Ulties\ProjectNameGenerator\Tests;

use PHPUnit\Framework\Constraint\RegularExpression;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase as BaseTestCase;
use SebastianBergmann\RecursionContext\InvalidArgumentException;

class TestCase extends BaseTestCase
{
    /**
     * Asserts that a string matches a given regular expression.
     *
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     */
    public static function assertMatchesRegularExpression(string $pattern, string $string, string $message = ''): void
    {
        static::assertThat($string, new RegularExpression($pattern), $message);
    }
}
