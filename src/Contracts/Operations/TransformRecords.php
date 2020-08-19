<?php

namespace Kelcampus\LaravelRepositoy\Contracts\Operations;

use Kelcampus\LaravelRepositoy\Contracts\Repository;

/**
 * Interface TransformRecords.
 */
interface TransformRecords extends Repository
{
    /**
     * @param \ArrayAccess $item
     * @param array           $meta
     *
     * @return \ArrayAccess
     */
    public function transformItem($item, $meta = []);

    /**
     * @param \Illuminate\Support\Collection $collection
     * @param array                                    $meta
     *
     * @return \ArrayAccess
     */
    public function transformCollection($collection, $meta = []);
}