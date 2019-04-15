<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class updateCandidatRequest extends FormRequest
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
           'nom'=>'required|string|min:2|max:20',
           'prenom'=>'required|string|min:2|max:30',
           'dateNaiss'=>'required|string|size:10',
           'numero'=>'required|size:8|unique:candidats,numero,'.(int)session()->get("idcandidat"),
           'login'=>'required|string|min:5|max:15|unique:candidats,login,'.(int)session()->get("idcandidat"),
           'password'=>'required|string|min:5|max:15',
           'photo'=>'required|mimes:jpeg,bmp,png|max:600000'
        ];
    }
}
