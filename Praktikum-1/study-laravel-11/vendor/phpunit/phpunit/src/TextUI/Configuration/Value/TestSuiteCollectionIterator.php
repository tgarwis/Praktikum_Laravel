<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\TextUI\Configuration;

use function count;
use function iterator_count;
use Countable;
use Iterator;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
 * @template-implements Iterator<int, TestSuite>
 */
final class TestSuiteCollectionIterator implements Countable, Iterator
{
    /**
     * @psalm-var list<TestSuite>
     */
    private readonly array $testSuites;
    private int $position = 0;

    public function __construct(TestSuiteCollection $testSuites)
    {
        $this->testSuites = $testSuites->asArray();
    }

    public function count(): int
    {
        return iterator_count($this);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        return $this->position < count($this->testSuites);
    }

    public function key(): int
    {
        return $this->position;
    }

    public function current(): TestSuite
    {
        return $this->testSuites[$this->position];
    }

    public function next(): void
    {
        $this->position++;
    }
}
