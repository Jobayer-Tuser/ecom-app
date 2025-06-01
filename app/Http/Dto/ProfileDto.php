<?php

namespace App\Http\Dto;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;


readonly class ProfileDto
{
    public function __construct(
        public ?int        $id,
        public string      $name,
        public string      $email,
        public string      $password,
        public string|null $image,
        public string|null $designation,
        public string|null $mobile,
    ){}

    public function validate(ProfileUpdateRequest $request, User $user): ProfileDto
    {
        return new self(
            id:         $user->id,
            name:       $request->input('name'),
            email:      $request->input('email'),
            password:   $request->input('password'),
            image:      $request->input('image'),
            designation: $request->input('designation'),
            mobile:     $request->input('mobile')
        );
    }
}
