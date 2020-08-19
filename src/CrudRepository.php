<?php

namespace Kelcampus\LaravelRepositoy;

use Kelcampus\LaravelRepositoy\Contracts\Repository as RepositoryContract;
use Kelcampus\LaravelRepositoy\Contracts\Operations\CreateRecords as CreateRecordsContract;
use Kelcampus\LaravelRepositoy\Operations\CreateRecords;
use Kelcampus\LaravelRepositoy\Contracts\Operations\ReadRecords as ReadRecordsContract;
use Kelcampus\LaravelRepositoy\Operations\DeleteRecords;
use Kelcampus\LaravelRepositoy\Operations\ReadRecords;
use Kelcampus\LaravelRepositoy\Contracts\Operations\UpdateRecords as UpdateRecordsContract;
use Kelcampus\LaravelRepositoy\Operations\UpdateRecords;
use Kelcampus\LaravelRepositoy\Contracts\Operations\DeleteRecords as DeleteRecordsContract;


/**
 * Class CrudRepository.
 */
abstract class CrudRepository extends Repository implements RepositoryContract,
                                                   ReadRecordsContract,
                                                   CreateRecordsContract,
                                                   UpdateRecordsContract,
                                                   DeleteRecordsContract
{
    use CreateRecords,
        ReadRecords,
        UpdateRecords,
        DeleteRecords;
}