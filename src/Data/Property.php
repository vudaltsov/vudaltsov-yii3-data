<?php

declare(strict_types=1);

namespace VUdaltsov\Yii3DataExperiment\Data;

/**
 * @api
 * @template TEntity of object
 * @implements EntityValueProvider<TEntity>
 */
final readonly class Property implements EntityValueProvider
{
    /**
     * @param class-string<TEntity> $_class
     * @param non-empty-string $property
     */
    public function __construct(
        string $_class,
        private string $property,
    ) {}

    public function getValue(object|array $entity): mixed
    {
        try {
            $property = new \ReflectionProperty($entity, $this->property);
        } catch (\ReflectionException $exception) {
            throw FieldDoesNotExist::property($entity::class, $this->property, $exception);
        }

        return $property->getValue($entity);
    }
}
