<?php

namespace Tochka\Promises\Models;

use Tochka\Promises\Enums\StateEnum;
use BenSampo\Enum\Traits\CastsEnums;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

/**
 * @property int       $id
 * @property int       $promise_id
 * @property StateEnum $state
 * @property array     $conditions
 * @property string    $initial_job
 * @property string    $result_job
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PromiseJob extends Model
{
    use CastsEnums;

    protected $casts = [
        'promise_id'  => 'int',
        'state'       => 'string',
        'conditions'  => 'array',
        'initial_job' => 'string',
        'result_job'  => 'string',
    ];

    protected $enumCasts = [
        'state' => StateEnum::class,
    ];

    public function getConnectionName()
    {
        return Config::get('promises.database.connection', null);
    }

    public function getTable()
    {
        return Config::get('promises.database.table_jobs', 'promise_jobs');
    }
}