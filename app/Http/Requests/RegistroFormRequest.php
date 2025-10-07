<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class RegistroFormRequest extends FormRequest
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
        "valor" => "required|numeric",
        "unidade" => "required",
        "cod_sensor" => "required"
        ];
    }

    public function failedValidation(Validator $validator)
    {
        //Se a requisição vier da API, retorna JSON
        if($this->expectsJson()){
            throw new HttpResponseException(response()->json([
                'success' => false,
                'message' => 'Erro de validação',
                'errors' => $validator->errors()
            ],422));
        }

        //Se for Livewire, lança uma exeção padrão do laravel
        throw new ValidationException($validator);

    }

    public function messages(){
        return[
            'cod_sensor.required' => 'O código do sensor é obrigatório.',
            'valor.required' => 'O valor do sensor é obrigatorio.',
            'valor.numeric' => 'O valor do sensor precisa ser numérico.',
            'unidade.required' => 'A unidade de médida é obrigatória',
        ];
    }
}
