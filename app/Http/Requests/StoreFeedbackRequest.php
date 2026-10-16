<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeedbackRequest extends FormRequest
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
     * @return array<string, list<string>>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:254'],
            'category' => ['required', 'in:question,bug,idea'],
            'sentiment' => ['required', 'in:great,okay,rough'],
            'message' => ['required', 'string', 'min:15', 'max:3000'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama perlu diisi.',
            'email.required' => 'Email perlu diisi.',
            'email.email' => 'Format email belum valid.',
            'category.required' => 'Pilih jenis masukan terlebih dahulu.',
            'category.in' => 'Pilihan jenis masukan tidak valid.',
            'sentiment.required' => 'Pilih bagaimana pengalamanmu.',
            'sentiment.in' => 'Pilihan pengalaman tidak valid.',
            'message.required' => 'Ceritakan sedikit tentang masukanmu.',
            'message.min' => 'Ceritamu terlalu singkat. Tambahkan sedikit konteks, ya.',
            'message.max' => 'Ceritamu terlalu panjang. Maksimal 3.000 karakter.',
        ];
    }
}
