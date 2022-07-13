<?php

namespace Binance\Validator\Mapping\Loader;

use Symfony\Component\Validator\Exception\MappingException;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Mapping\Loader\StaticMethodLoader;

final class SoftStaticMethodLoader extends StaticMethodLoader
{
    /**
     * {@inheritdoc}
     */
    public function loadClassMetadata(ClassMetadata $metadata): bool
    {
        /** @var \ReflectionClass $reflClass */
        $reflClass = $metadata->getReflectionClass();

        if (!$reflClass->isInterface() && $reflClass->hasMethod($this->methodName)) {
            $reflMethod = $reflClass->getMethod($this->methodName);

            if ($reflMethod->isAbstract()) {
                return false;
            }

            if (!$reflMethod->isStatic()) {
                throw new MappingException(sprintf('The method "%s::%s()" should be static.', $reflClass->name, $this->methodName));
            }

            $instance = $reflClass->newInstance();
            $instance::{$this->methodName}($metadata);
//            dd($metadata);
            return true;
        }

        return false;
    }
}
