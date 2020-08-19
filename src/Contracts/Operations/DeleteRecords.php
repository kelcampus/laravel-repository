<?php

namespace Kelcampus\LaravelRepositoy\Contracts\Operations;

use Kelcampus\LaravelRepositoy\Contracts\Repository;

/**
 * Interface DeleteRecords.
 */
interface DeleteRecords extends Repository
{
    /**
     * Run the delete command model.
     * The goal is to enable the implementation of your business logic before the command.
     *
     * @param \Illuminate\Database\Eloquent\Model
     *
     * @return bool
     */
    public function delete($model);
}