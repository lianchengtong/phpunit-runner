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

final class AnnotationCollection implements \Countable, \IteratorAggregate
{
    /**
     * @var Annotation[]
     */
    private $annotations = [];

    public static function fromArray(Annotation ...$annotations): self
    {
        $result = new self;

        foreach ($annotations as $annotation) {
            $result->add($annotation);
        }

        return $result;
    }

    public function count(): int
    {
        return \count($this->annotations);
    }

    public function add(Annotation $annotation): void
    {
        $this->annotations[] = $annotation;
    }

    /**
     * @return Annotation[]
     */
    public function asArray(): array
    {
        return $this->annotations;
    }

    public function getIterator(): AnnotationCollectionIterator
    {
        return new AnnotationCollectionIterator($this);
    }
}
