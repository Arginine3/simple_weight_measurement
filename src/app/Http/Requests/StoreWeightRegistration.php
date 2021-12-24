<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWeightRegistration extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //false->trueにしないとうまく動かない可能性あり
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
            //
            'clint_name' => 'required|string|max:20',
            'birth_date' => 'required|max:20',
            'sex' => 'required|boolean',
            'weight' => 'required|string|max:8',
            'year_month_date' => 'required|string|max:20',
            'height' => 'required|string|max:8',
        ];
    }
}
