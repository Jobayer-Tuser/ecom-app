<?php

namespace App\Http\Dto;

use App\Http\Requests\ProfileUpdateRequest;
use Modules\JiraBoard\Models\User;

class ProfileDto
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly string|null $image,
        public readonly string|null $designation,
        public readonly string|null $mobile,
    ){}

    public function validate(ProfileUpdateRequest $request, User $user): ProfileDto
    {
        return new self(
            id: $user->id,
            name: $request->get('name'),
            email: $request->get('email'),
            password: $request->get('password'),
            image: $request->get('image'),
            designation: $request->get('designation'),
            mobile: $request->get('mobile')
        );
    }

}
