<?php

namespace App\Http\Requests;

//use App\Asset;

use App\State;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreLeadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('lead_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'client' => [
                'required', 'string',
            ],
            'company' => [
                'required', 'string',
            ],
            'coast' => [
                'required', 'string',
            ],
            'origin' => [
                'required', 'string',
            ],
            'state' => [
                'required', 'string',
            ],
            'email' => [
                'required', 'email', 'unique:users',
            ],
            'phone' => [
                'required', 'string',
            ],
            'description' => [
                'required', 'string',
            ],
            'role_id' => [
                'integer', 'in:' . State::pluck('id')->implode(','),
            ],
        ];
    }
}
