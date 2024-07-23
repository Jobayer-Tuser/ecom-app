<x-app-layout>
    <div class="container">
        <div class="profile">
            <div class="profile-header">
                <div class="profile-header-cover"></div>
                <div class="profile-header-content">
                    <div class="profile-header-img">
                        <img src="{{ asset('assets/img/user/profile.jpg')}}" alt="" />
                    </div>
                    <ul class="profile-header-tab nav nav-tabs nav-tabs-v2">
                        <li class="nav-item">
                            <a href="#profile-post" class="nav-link active" data-bs-toggle="tab">
                                <div class="nav-field">Profile Info</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#profile-followers" class="nav-link" data-bs-toggle="tab">
                                <div class="nav-field">Update Password</div>
    {{--                            <div class="nav-value">1.3m</div>--}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="profile-container">
                <div class="profile-sidebar">
                    <div class="desktop-sticky-top">
                        <h4>{{ auth()->user()->name }}</h4>
                        <div class="fw-600 mb-3 text-muted mt-n2">{{ auth()->user()->email }}</div>
                        <div class="mb-1">
                            <i class="fa fa-map-marker-alt fa-fw text-muted"></i> New York, NY
                        </div>
                        <div class="mb-3">
                            <i class="fa fa-link fa-fw text-muted"></i> johnsmith/studio
                        </div>
                    </div>
                </div>

                <div class="profile-content">
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <div class="tab-content p-0">
                                <div class="tab-pane fade show active" id="profile-post">
                                    <div id="formGrid" class="mb-5">
                                        <div class="card">
                                            <div class="card-body">
                                                <form method="POST" action="{{route('profile.update', auth()->user()->id)}}">
                                                    @csrf
                                                    @method('patch')
                                                    <div class="row mb-n3">
                                                        <div class="col-md-6 mb-3">
                                                            <x-input-label for="name" :value="__('Name')" />
                                                            <x-input-text id="name" name="name" type="text" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <x-input-label for="email" :value="__('Email')" />
                                                            <x-input-text id="email" name="email" type="email" :value="old('email', $user->email)" required autocomplete="username" />
                                                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mt-3">
                                                            <button type="submit" class="btn btn-lime">{{ __('Update') }}</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="tab-content p-0">
                                <div class="tab-pane fade show active" id="profile-post">
                                    <div id="formGrid" class="mb-5">
                                        <div class="card">
                                            <div class="card-body">
                                                <form method="POST" action="{{route('password.update', auth()->user()->id)}}">
                                                    @csrf
                                                    @method('patch')
                                                    <div class="row mb-n3">
                                                        <div class="col-md-6 mb-3">
                                                            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
                                                            <x-input-text id="update_password_current_password" name="current_password" type="password" autocomplete="current-password" />
                                                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <x-input-label for="update_password_password" :value="__('New Password')" />
                                                            <x-input-text id="update_password_password" name="password" type="password" autocomplete="new-password" />
                                                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                                                            <x-input-text id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" />
                                                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mt-3">
                                                            <button type="submit" class="btn btn-lime">{{__('Update')}}</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
