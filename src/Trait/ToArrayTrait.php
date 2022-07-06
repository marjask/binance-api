<?php

namespace Trait;

trait ToArrayTrait
{
    public function toArray(): array
    {
        $result = [];

        foreach ($this as $property => $value) {
            if (is_object($value) && method_exists($value, 'toArray')) {
                $result[$property] = $value->toArray();
            } else {
                $result[$property] = $value;
            }
        }

        return $result;
    }
}
