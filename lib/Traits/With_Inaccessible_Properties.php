<?php

namespace Adiungo\Tests\Traits;

use ReflectionException;

trait With_Inaccessible_Properties
{
    /**
     * Gets a property that is otherwise inaccessible.
     *
     * @param object $object
     * @param string $property
     * @return mixed
     * @throws ReflectionException
     */
    protected function get_protected_property(object $object, string $property): mixed
    {
        $reflection = new \ReflectionClass($object);

        return $reflection->getProperty($property);
    }

    /**
     * Sets the value of an inaccessible property.
     *
     * @param object $object
     * @param string $property
     * @param mixed $value
     * @return void
     * @throws ReflectionException
     */
    protected function set_protected_property(object $object, string $property, mixed $value): void
    {
        $reflection_property = self::get_protected_property($object, $property);
        $reflection_property->setAccessible(true);

        $reflection_property->setValue($object, $value);
    }
}
