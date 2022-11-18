<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePasienRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nik' => 'required|numeric',
            'nama_anak' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'anak_ke' => 'required|numeric',
            'bb_lahir' => 'required|numeric',
            'pb_lahir' => 'required|numeric',
            'kia' => 'required',
            'imd' => 'required',
            'id_posyandu' => 'required',
        ];
    }
}
