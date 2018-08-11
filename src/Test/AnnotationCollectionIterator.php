<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\NewRunner;

final class AnnotationCollectionIterator implements \Iterator
{
    /**
     * @var Annotation[]
     */
    private $annotations;

    /**
     * @var int
     */
    private $position;

    public function __construct(AnnotationCollection $collection)
    {
        $this->annotations = $collection->asArray();
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        return $this->position < \count($this->annotations);
    }

    public function key(): int
    {
        return $this->position;
    }

    public function current(): Annotation
    {
        return $this->annotations[$this->position];
    }

    public function next(): void
    {
        $this->position++;
    }
}
