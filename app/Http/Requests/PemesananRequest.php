<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PemesananRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
            switch ($this->method()) {
                case 'POST':
                {
                    return [
                        'nama' => 'required',
                        'no_hp' => 'required',
                        'lapangan_id' => 'required|numeric',
                        'waktu_mulai' => 'required|unique:pemesanans|date_format:Y-m-d H:i',
                        'waktu_akhir' => 'required|unique:pemesanans|date_format:Y-m-d H:i',
                    ];
                }
                case 'PUT':
                case 'PATCH':
                {
                    return [
                        'nama' => 'required',
                        'no_hp' => 'required',
                        'lapangan_id' => ['required','numeric'],
                        'waktu_mulai' => ['required','unique:pemesanans,waktu_mulai, ' . $this->route()->pemesanan->id, 'date_format:Y-m-d H:i'],
                        'waktu_akhir' => ['required','unique:pemesanans,waktu_akhir, ' . $this->route()->pemesanan->id, 'date_format:Y-m-d H:i'],
                    ];
                }
                default: break;
            }
    }
}
