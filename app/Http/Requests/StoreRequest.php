<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
           'contact' => 'required|max:8|regex:/^[0-9]{8}$/',
            'badge' => 'required|max:3|regex:/^[0-9]+$/',
            'lib_direction' => 'required|min:3|regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ0-9_.\' ?]+$/',
            'contact_direction' => 'required|max:8|regex:/^[0-9]{8}$/',
            'nom_prenom_hote' => 'required|min:2|regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ\'. ?]+$/' 
        ];
    }

     public function messages()
    {
        return [
            'num_piece.required' => 'Renseigner correctement le numero de piece.',
            'nom.required'  => 'Renseigner correctement le nom du visiteur.',
            'prenoms.required'  => 'Renseigner correctement le prenom visiteur.',
            'contact.required'  => 'Renseigner correctement le contact du visiteur.',
            'badge.required' => 'Renseigner correctement le numero de badge.',
            'lib_direction.required' => 'Renseigner correctement le nom de la direction.',
            'contact_direction.required'  => 'Renseigner correctement le contact de la direction.',
            'nom_prenom_hote.required'  => 'Renseigner correctement le nom et prénoms de l\'hote.',
        ];
    }
}
