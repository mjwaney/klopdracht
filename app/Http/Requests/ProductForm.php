<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductForm extends FormRequest
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
        $this->sanitize();

        return [
            'name' => 'bail|required|unique:products,name',
            'description' => 'bail|required',
            'price' => 'bail|required',
            'image' => 'bail|required|image',
            'stock' => 'bail|required|numeric',
        ];
    }

    public function sanitize()
    {
        $input = $this->all();

        $input['name'] = filter_var($input['name'], FILTER_SANITIZE_STRING);
        $input['description'] = filter_var($input['description'], FILTER_SANITIZE_STRING);
        $input['price'] = filter_var($input['price'], FILTER_SANITIZE_NUMBER_INT);        
        $input['stock'] = filter_var($input['stock'], FILTER_SANITIZE_NUMBER_INT);        

        $this->replace($input);     
    }
}
