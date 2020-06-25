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
        return [
            'name' => 'required|min:5|max:50',
            'desc' => 'required|min:5|max:500',
            'image' => 'required',
            'price' => 'required',
            'pin' => 'required',
            'card' => 'required',
            'cpu' => 'required',
            'camera' => 'required',
            'hdh' => 'required',
            'screen' => 'required',
            'product_brand_id' => 'required'

        ];
    }
    public function messages(){
        return [
            'name.required' => trans('product.errors.name.required'),
            'name.min' => trans('product.errors.name.min'),
            'name.max' => trans('product.errors.name.max'),
            'desc.required' => trans('product.errors.desc.required'),
            'desc.min' => trans('product.errors.desc.min'),
            'desc.max' => trans('product.errors.desc.max'),
            'image.required' =>trans('product.errors.image.required'),
            'pin.required' =>trans('product.errors.pin.required'),
            'card.required' =>trans('product.errors.card.required'),
            'cpu.required' =>trans('product.errors.cpu.required'),
            'camera.required' =>trans('product.errors.camera.required'),
            'hdh.required' =>trans('product.errors.hdh.required'),
            'screen.required' =>trans('product.errors.screen.required'),
            'product_brand_id.required' =>trans('product.errors.product_brand_id.required'),
        ];
    }
}
