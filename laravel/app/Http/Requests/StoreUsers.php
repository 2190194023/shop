<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsers extends FormRequest
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
            'uname' => 'required|unique:users|regex:/^[a-zA-Z]{1}[\w]{4,17}$/',
            'password' => 'required|regex:/^[\w]{6,18}$/',
            'repass' => 'required|same:password',
            'phone' => 'required|regex:/^1{1}[3-8]{1}[\d]{9}$/',
            'email' => 'required|email:',
            'profile' => 'required',
        ];
    }

    /**
     * 自定义 错误消息
     */
    public function messages()
    {
        return [
            'uname.required'=>'用户名必填',
            'uname.regex'=>'用户名格式不正确',
            'uname.unique'=>'用户名已存在',

            'password.required'=>'密码必填',
            'password.regex'=>'密码格式不正确',

            'repass.required'=>'确认密码必填',
            'repass.same'=>'两次密码不一致',

            'phone.required'=>'手机号必填',
            'phone.regex'=>'手机号格式不正确',

            'email.required'=>'邮箱必填',
            'email.email'=>'邮箱格式不正确',

            'profile.required'=>'头像必填',
        ];
    }
}
