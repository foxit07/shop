<?php

namespace App\Models\Admin;

use Baum\Node;

class Category extends Node
{

    const PARENT_CATEGORIES = 0;
    const STATUS_ACTIVE = 1;

    protected $table = 'categories';

    // 'parent_id' column name
    protected $parentColumn = 'parent_id';

    // 'lft' column name
    protected $leftColumn = 'left_index';

    // 'rgt' column name
    protected $rightColumn = 'right_index';

    // 'depth' column name
    protected $depthColumn = 'depth';

    // guard attributes from mass-assignment
    protected $guarded =  ['id', 'left_index', 'right_index', 'depth'];



    public static function boot()
    {
        parent::boot();

        self::creating(function($category){
            if(empty($category->slug)){
                $category->slug = str_slug($category->name);
            }else{
                $category->slug = strtolower($category->slug);
            }
        });

        self::updating(function($category){
            if(empty($category->slug)){
                $category->slug = str_slug($category->name);
            }else{
                $category->slug = strtolower($category->slug);
            }
        });
    }


    /**
     * @return array | Name for columns
     */
    public function nameColumns()
    {
        return [
            'id' => 'id',
            'path' => 'path',
            'name' => 'name',
            'slug' => 'slug',
            'action' => 'Action'
        ];
    }


    /**
     * @param $item | object Category
     * @param $path | string
     * @return string | path category
     */
    private function path($item, $path)
    {
        $msk = ' > ';
        if ($item->parent()->get()) {
            $parent = $item->parent()->get();

            foreach ($parent as $val) {
                $path = $val->name . $msk . $path;
                return $this->path($val, $path);
            }
        }
        return $path;
    }


    /**
     * @return array | all Category
     */
    public function allWithPath()
    {
        $categories = self::all();
        $a = [];
        foreach ($categories as $category){
            if($category->isChild()){
                foreach ($category->getDescendantsAndSelf() as $item){
                    $item->path = $this->path($item, $item->name);
                    $a[] = $item;
                };
            }else{
                $category->path = $category->name;
                $a[] = $category;
            }
        }
        return array_unique($a);
    }
}
