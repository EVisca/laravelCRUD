<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            //
                
        'fname' => 'required',
        'lname' => 'required',
        'email'=> 'required|email|unique:users,email,' . request()->id,
        'password' => 'required'
            
        ];
    }
/*
    public function updateUser(UpdateUser $request, $id)
    {

        $user = User::findOrFail($id);

        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $reqest->email;
        $user->password = $request->password;
        $user->notes = $request->notes;

        $user->save();


        return redirect()->back()->with('sucess', 'User has been updated sucessfully.');

    }*/
}
