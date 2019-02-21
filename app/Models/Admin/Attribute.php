<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;


class Attribute extends Model
{
    protected $table = 'attributes';

    protected $guarded = [];

    /**
     * @return array | Name for columns
     */
    public function nameColumns()
    {
        return [
            'id' => 'id',
            'name' => 'name',
            'group' => 'group',
            'action' => 'action'
        ];
    }

    public function group()
    {
        return $this->belongsTo(AttributeGroup::class);
    }
}
