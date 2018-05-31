<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HoteRequest extends FormRequest
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
            'lib_direction' => 'required|min:3|regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ0-9_.\' ?]+$/',
            'contact_direction' => 'required|max:8|regex:/^[0-9]{8}$/',
            'nom_hote' => 'required|min:2:|regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ\']+$/',
            'prenoms_hote' => 'required|min:2|regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ\'. ?]+$/' 
        ];
    }
    public function messages()
    {
        return [
            'lib_direction.required' => 'La direction n\'a pas été renseignée',
            'contact_direction.required'  => 'Le contact n\'a pas été renseignée',
            'nom_hote.required'  => 'Le nom n\'a pas été renseignée',
            'prenoms_hote.required'  => 'Le prenom n\'a pas été renseignée',
            
        ];
    }
}
