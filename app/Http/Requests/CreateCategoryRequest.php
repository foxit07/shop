<?php

namespace App\Http\Requests;

use App\Models\Admin\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class CreateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

      $name = $this->input('name');

       return [
           'name' => 'required|max:100|unique:categories',
        ];
    }
}
