<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisiteurRequest extends FormRequest
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
          'num_piece' => 'required|min:5|regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ0-9_. ?]+$/',
            'nom' => 'required|min:2:|regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ\']+$/',
            'prenoms' => 'required|min:2|regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ\'. ?]+$/',
           'contact' => 'required|max:8|regex:/^[0-9]{8}$/'
        ];
    }

    public function messages()
    {
        return [
            'num_piece.required' => 'Veuillez bien renseigner le champ numero de piece',
            'nom.required'  => 'Veuillez bien renseigner le champ nom',
            'prenoms.required'  => 'Veuillez bien renseigner le champ prenoms',
            'contact.required'  => 'Veuillez bien renseigner le champ contact',
        ];
    }
}
