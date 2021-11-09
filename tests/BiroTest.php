<?php

declare(strict_types=1);

use App\Anagrams;
use PHPUnit\Framework\TestCase;

class BiroTest extends TestCase
{
    public function test_checkExistsRepeatedLetter(): void
    {
        $word = new Anagrams('biro');

        $this->assertFalse($word->checkExistsRepeatedLetter($word->string));

        $word = new Anagrams('biroo');

        $this->assertTrue($word->checkExistsRepeatedLetter($word->string));
    }

    public function test_SplitString(): void
    {
        $word = new Anagrams('biro');

        $expected = [
            0 => 'b',
            1 => 'i',
            2 => 'r',
            3 => 'o',
        ];

        $this->assertEquals($expected, $word->makeSplit($word->string));
    }

    public function test_QtAnagramsWithoutRepeatedLetter(): void
    {
        $word = new Anagrams('biro');

        $expected = 24;

        $this->assertEquals($expected, $word->calcFactorial(strlen($word->string)));
    }

    public function test_QtAnagramsWithRepeatedLetter(): void
    {
        $word = new Anagrams('biroo');

        $expected = 60;

        $this->assertEquals($expected, $word->qtAnagramsWithRepeatedLetter($word->string));
    }

    public function test_MakeShuffleWord(): void
    {
        $word = new Anagrams('biro');

        $expected = "";

        $this->assertNotEquals($expected, $word->makeShuffleWord($word->string));
    }

    public function test_MakeListAnagram(): void
    {
        $word = new Anagrams('biro');

        $expected = [
            'biro',
            'bior',
            'brio',
            'broi',
            'boir',
            'bori',
            'ibro',
            'ibor',
            'irbo',
            'irob',
            'iobr',
            'iorb',
            'rbio',
            'rboi',
            'ribo',
            'riob',
            'roib',
            'robi',
            'obir',
            'obri',
            'oibr',
            'oirb',
            'orbi',
            'orib',
        ];

        sort($expected);

        $this->assertEquals($expected, $word->makeListAnagram($word->string, 24));
    }
}
