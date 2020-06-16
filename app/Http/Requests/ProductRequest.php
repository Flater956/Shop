<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rules= [
            'name'=>'required|min:3|max:255',
            'desc'=>'required|min:3|max:255',
            'price'=>'required|numeric',
            'img'=>'',
        ];
        if ($this->route()->named('products.store')){
            $rules['img'] .='required' ;
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'required'=>'поле :attribute обязательно для заполнения',
            //'img.required'=>'загрузите картинку товара',
            'min'=>'поле :attribute должно содержать минимум :min символов',
            'max'=>'поле :attribute должно содержать максимум :max символов',
            'numeric'=>'цена должна быть числом'
        ];
    }
}
