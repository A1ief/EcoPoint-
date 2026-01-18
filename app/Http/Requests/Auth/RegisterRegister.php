<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'nama'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'alamat'   => 'required|string',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required'     => 'Nama lengkap harus diisi.',
            'email.required'    => 'Email harus diisi.',
            'email.email'       => 'Format email tidak valid.',
            'email.unique'      => 'Email sudah terdaftar.',
            'alamat.required'   => 'Alamat harus diisi.',
            'password.required' => 'Password harus diisi.',
            'password.min'      => 'Password minimal 6 karakter.',
        ];
    }
}
