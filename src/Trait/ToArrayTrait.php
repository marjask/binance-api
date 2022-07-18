<?php

namespace Trait;

use Binance\ValueObject\AbstractVO;

trait ToArrayTrait
{
    public function toArray(): array
    {
        $result = [];

        foreach ($this as $property => $value) {
            if (is_object($value) && method_exists($value, 'toArray')) {
                $result[$property] = $value->toArray();
            } else if ($value instanceof AbstractVO) {
                $result[$property] = $value->getValue();
            } else {
                $result[$property] = $value;
            }
        }

        return $result;
    }
}
