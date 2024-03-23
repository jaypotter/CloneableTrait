<?php

declare(strict_types=1);

namespace Potter\Cloneable;

trait CloneableTrait 
{
    final public function getClone(): CloneableInterface
    {
        return clone $this;
    }
    
    final protected function with(string $id, mixed $entry): CloneableInterface
    {
        ($clone = $this->getClone())->set($id, $entry);
        return $clone;
    }
    
    final protected function without(string $id): CloneableInterface
    {
        ($clone = $this->getClone())->unset($id);
        return $clone;
    }
    
    abstract protected function set(string $id, mixed $entry): void;
    abstract protected function unset(string $id): void;
}