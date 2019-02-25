<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AttributeGroup extends Model
{
    protected $table = 'attributes_group';
    protected $guarded = [];


    public function attributes()
    {
        return $this->hasMany(Attribute::class, 'group_id');
    }

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
