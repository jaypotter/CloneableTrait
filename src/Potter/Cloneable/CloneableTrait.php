<?php

declare(strict_types=1);

namespace Potter\Cloneable;

trait CloneableTrait 
{
    final public function getClone(): static
    {
        return clone $this;
    }
    
    final protected function with(string $id, mixed $entry): static
    {
        $clone = $this->getClone();
        if (method_exists($clone, 'set')) {
            $clone->set($id, $entry);
            return $clone;
        }
        $clone->$id = $entry;
        return $clone;
    }
    
    final protected function without(string $id): static
    {
        $clone = $this->getClone();
        if (method_exists($clone, 'unset')) {
            $clone->unset($id);
            return $clone;
        }
        unset($clone->$id);
        return $clone;
    }
}