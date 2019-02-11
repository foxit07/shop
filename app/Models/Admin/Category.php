<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const PARENT_CATEGORIES = 0;
    const STATUS_ACTIVE = 1;

    protected $guarded = [];

    public function getTableColumns()
    {
        return $this
            ->getConnection()
            ->getSchemaBuilder()
            ->getColumnListing($this->getTable());
    }

    public function getParentsCategory()
    {
        return $this->where(['parent_id' => self::PARENT_CATEGORIES, 'status' => self::STATUS_ACTIVE])->get();
    }
}
