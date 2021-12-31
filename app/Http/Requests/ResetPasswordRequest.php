<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class ResetPasswordRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'user_name' => 'required|exists:users',
            'password'  => 'required|min:8|confirmed',
        ];
    }

    public function resetPassword() {
        $user = User::where('user_name', $this->user_name)->first();

        DB::table('password_resets')
            ->where('email', $user->email)
            ->delete();

        $user->update([
            'password' => $this->password,
        ]);

        return $user;
    }
}
