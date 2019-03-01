<?php

namespace App\Models\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait Fileable
{


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }


    /**
     * Boot the trait.
     */
    protected static function bootFileable()
    {
        static::deleting(function ($model) {

            $model->deleteDirectory($model->getRootDirectory() . $model->id);
            $model->files->each->delete();
        });
    }

    public function saveFiles(Request $request)
    {
        $uploadedFiles = $request->file('files');

        foreach ($uploadedFiles as $uploadedFile){
            $filename = time().$uploadedFile->getClientOriginalName();
            $dir = md5($filename);
            $path = $this->rootDir . $this->id .'/'. $dir .'/';
            Storage::disk('local')->putFileAs($path, $uploadedFile, $filename);
            $att = ['path' => $path .  $filename];
            $this->files()->create($att);
        }

    }

    /**
     * @param $path | Path to directory
     */
    public function deleteDirectory($path)
    {
        Storage::deleteDirectory($path);
    }
}