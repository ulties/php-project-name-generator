<?php

namespace Ulties\ProjectNameGenerator;

class Generator
{
    /**
     * Array of adjectives.
     *
     * @var null|array
     */
    protected static $adjectives;

    /**
     * Array or nouns.
     *
     * @var null|array
     */
    protected static $nouns;

    /**
     * Generate project name.
     *
     * @param string $glue
     * @param int $words
     * @return string
     */
    public static function generate(string $glue = ' ', int $words = 2): string
    {
        return implode($glue, self::raw($words));
    }

    /**
     * Generate dashed project name.
     *
     * @return string
     */
    public static function dashed(): string
    {
        return self::generate('-');
    }

    /**
     * Generate spaced project name.
     *
     * @return string
     */
    public static function spaced(): string
    {
        return self::generate(' ');
    }

    /**
     * Generate snake case project name.
     *
     * @return string
     */
    public static function snake(): string
    {
        return self::generate('_');
    }

    /**
     * Generate array of words.
     *
     * @param int $words
     * @return array
     */
    public static function raw(int $words = 2): array
    {
        // Load words
        $adjectives = self::adjectives();
        $nouns = self::nouns();

        // Initialize result
        $result = [];

        // Add adjectives
        for ($i = 1; $i < $words; $i++) {
            $result[] = $adjectives[rand(0, sizeof($adjectives) - 1)];
        }

        // Add noun
        $result[] = $nouns[rand(0, sizeof($nouns) - 1)];

        return $result;
    }

    /**
     * Get adjectives.
     *
     * @return array
     */
    public static function adjectives(): array
    {
        if (is_null(self::$adjectives)) {
            self::$adjectives = require ENGLISH_WORDS_PATH . '/adjectives.php';
        }

        return self::$adjectives;
    }

    /**
     * Get nouns.
     *
     * @return array
     */
    public static function nouns(): array
    {
        if (is_null(self::$nouns)) {
            self::$nouns = require ENGLISH_WORDS_PATH . '/nouns.php';
        }

        return self::$nouns;
    }

    /**
     * Set adjectives.
     *
     * @param array $adjectives
     */
    public static function setAdjectives(array $adjectives)
    {
        static::$adjectives = $adjectives;
    }

    /**
     * Set nouns.
     *
     * @param array $nouns
     */
    public static function setNouns(array $nouns)
    {
        static::$nouns = $nouns;
    }
}
