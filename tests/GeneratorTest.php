<?php

namespace Ulties\ProjectNameGenerator\Tests;

use PHPUnit\Framework\TestCase;
use Ulties\ProjectNameGenerator\Generator;

class GeneratorTest extends TestCase
{
    /**
     * @var array
     */
    protected $nouns;

    /**
     * @var array
     */
    protected $adjectives;

    public function __construct(string $name = null, array $data = [], $dataName = '')
    {
        // Load words.
        $this->nouns = require __DIR__ . '/../words/nouns.php';
        $this->adjectives = require __DIR__ . '/../words/adjectives.php';

        parent::__construct($name, $data, $dataName);
    }

    /** @test */
    public function assert_it_can_make_correct_words()
    {
        $projectName = Generator::generate();

        $this->assertMatchesRegularExpression('/^([\w])+ ([\w])+$/', $projectName);
        $parts = explode(' ', $projectName);

        $this->assertIsAdjective($parts[0]);
        $this->assertIsNoun($parts[1]);
    }

    /** @test */
    public function assert_it_can_make_more_adjectives()
    {
        $projectName = Generator::generate(' ', 3);

        $this->assertMatchesRegularExpression('/^([\w])+ ([\w])+ ([\w])+$/', $projectName);
        $parts = explode(' ', $projectName);

        $this->assertIsAdjective($parts[0]);
        $this->assertIsAdjective($parts[1]);
        $this->assertIsNoun($parts[2]);
    }

    /** @test */
    public function assert_it_can_make_custom_glued_name()
    {
        $projectName = Generator::generate('/', 2);

        $this->assertMatchesRegularExpression('/^([\w])+\/([\w])+$/', $projectName);
        $parts = explode('/', $projectName);

        $this->assertIsAdjective($parts[0]);
        $this->assertIsNoun($parts[1]);
    }

    /** @test */
    public function assert_it_can_make_snake_cased_name()
    {
        $projectName = Generator::snake();

        $this->assertMatchesRegularExpression('/^([\w])+_([\w])+$/', $projectName);
        $parts = explode('_', $projectName);

        $this->assertIsAdjective($parts[0]);
        $this->assertIsNoun($parts[1]);
    }

    /** @test */
    public function assert_it_can_make_kebab_cased_name()
    {
        $projectName = Generator::dashed();

        $this->assertMatchesRegularExpression('/^([\w])+-([\w])+$/', $projectName);
        $parts = explode('-', $projectName);

        $this->assertIsAdjective($parts[0]);
        $this->assertIsNoun($parts[1]);
    }

    /** @test */
    public function assert_it_can_make_spaced_name()
    {
        $projectName = Generator::spaced();

        $this->assertMatchesRegularExpression('/^([\w])+ ([\w])+$/', $projectName);
        $parts = explode(' ', $projectName);

        $this->assertIsAdjective($parts[0]);
        $this->assertIsNoun($parts[1]);
    }

    /** @test */
    public function assert_raw_method_returns_array()
    {
        $parts = Generator::raw(2);

        $this->assertIsAdjective($parts[0]);
        $this->assertIsNoun($parts[1]);
    }

    /** @test */
    public function assert_test_with_custom_words()
    {
        Generator::setAdjectives(['adjective']);
        Generator::setNouns(['noun']);

        $this->assertEquals('adjective noun', Generator::generate());
    }

    protected function assertIsAdjective(string $word)
    {
        $this->assertTrue(in_array($word, $this->adjectives));
    }

    protected function assertIsNoun(string $word)
    {
        $this->assertTrue(in_array($word, $this->nouns));
    }
}
