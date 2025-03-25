<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
         'editName' => 'nullable|string|max:255',
         'editEmail' => 'nullable|email|unique:users,email,' . $this->route('id'),
         'editRole' => 'nullable|string|max:255',
         'editPassword' => 'nullable|min:8', // Password is optional
         'editOffice' => 'nullable|exists:offices,id', // Validate office_id
         'editDesignation' => 'nullable|string|max:255', // Optional field
      ];
   }
}
