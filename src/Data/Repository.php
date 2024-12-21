<?php

declare(strict_types=1);

namespace Yii3DataStream\Data;

/**
 * @api
 * @template-covariant TEntity of array|object
 */
interface Repository
{
    /**
     * @param ?non-negative-int $limit
     * @return iterable<TEntity>
     */
    public function query(int $offset = 0, ?int $limit = null, Sort $sort = new Sort()): iterable;
}
