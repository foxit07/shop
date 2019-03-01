<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{

    protected $guarded = [];

    /**
     * @return array | Name for columns
     */
    public function nameColumns()
    {
        return [
            'id' => 'id',
            'name' => 'name',
            'action' => 'action'
        ];
    }
}
