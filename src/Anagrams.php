<?php

declare(strict_types=1);

namespace App;

use function array_product;
use function array_search;
use function count;
use function count_chars;
use function implode;
use function range;
use function shuffle;
use function sort;
use function str_split;
use function strlen;

class Anagrams
{
    public string $string;

    public function __construct(string $string)
    {
        $this->string = $string;
    }

    public function checkExistsRepeatedLetter(string $string): bool
    {
        foreach (count_chars($string, 1) as $key => $value) {
            if ($value > 1) {
                return true;
            }
        }
        return false;
    }

    public function makeSplit(string $word): array
    {
        return str_split((string) $word);
    }

    public function calcFactorial(int $strlen): int
    {
        return array_product(range(1, $strlen));
    }

    public function qtAnagramsWithRepeatedLetter(string $string): int
    {
        $denominator = 1;
        foreach (count_chars($string, 1) as $key => $value) {
            $denominator *= $this->calcFactorial($value);
        }

        return $this->calcFactorial(strlen($string)) / $denominator;
    }

    public function makeShuffleWord(string $string): string
    {
        $arrayShuffle = $this->makeSplit($string);
        shuffle($arrayShuffle);
        return implode("", $arrayShuffle);
    }

    public function makeListAnagram(string $string, int $qtAnagrams): array
    {
        $result = [];
//        $qtAnagrams = 0;
        do {
            $anagram = $this->makeShuffleWord($string);
            if (array_search($anagram, $result, true) === false) {
                $result[] = $anagram;
            }
        } while (count($result) !== $qtAnagrams);
        sort($result);
        return $result;
    }
}
