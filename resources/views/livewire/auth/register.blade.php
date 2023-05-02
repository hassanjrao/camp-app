<div class="container-fluid py-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form wire:submit.prevent='register'>

                        <fieldset class="form-group border p-3 mb-3">

                            <legend class="w-auto">Participant Info</legend>


                            <div class="row mb-3 pl-4">

                                <div class="col-md-6">
                                    <label for="name" class=" text-md-end">{{ __('Name') }}</label>

                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        wire:model.defer='name' required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">

                                    <label for="email" class=" text-md-end">{{ __('Email Address') }}</label>

                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        wire:model.defer='email' required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mb-3">



                                <div class="col-md-6">
                                    <label for="phone" class=" text-md-end">{{ __('Phone') }}</label>

                                    <input id="phone" type="tel"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        wire:model.defer='phone' autocomplete="phone" autofocus>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-md-6">

                                    <label for="age" class=" text-md-end">{{ __('Age') }}</label>

                                    <input id="age" type="text"
                                        class="form-control @error('age') is-invalid @enderror"
                                        wire:model.defer='age' autocomplete="age">

                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>





                            <div class="row mb-3">


                                <div class="col-md-6">
                                    <label for="address" class=" text-md-end">{{ __('Address') }}</label>

                                    <input id="address" type="tel"
                                        class="form-control @error('address') is-invalid @enderror"
                                        wire:model.defer='address' autocomplete="address" autofocus>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="city" class=" text-md-end">{{ __('City') }}</label>

                                    <input id="city" type="tel"
                                        class="form-control @error('city') is-invalid @enderror"
                                        wire:model.defer='city' autocomplete="city" autofocus>

                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-md-3">
                                    <label for="state" class=" text-md-end">{{ __('State') }}</label>

                                    <input id="state" type="tel"
                                        class="form-control @error('state') is-invalid @enderror"
                                        wire:model.defer='state' autocomplete="state" autofocus>

                                    @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>











                            </div>


                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <label for="zip" class=" text-md-end">{{ __('Zip code') }}</label>

                                    <input id="zip" type="tel"
                                        class="form-control @error('zip') is-invalid @enderror"
                                        wire:model.defer='zip' autocomplete="zip" autofocus>

                                    @error('zip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">

                                    <label for="gender" class=" text-md-end">{{ __('Gender') }}</label>

                                    <select id="gender" class="form-select" wire:model='gender'
                                        @error('gender') is-invalid @enderror>
                                        <option>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option selected value="not specified">Not Specified</option>
                                    </select>

                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>


                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <label for="password" class=" text-md-end">{{ __('Password') }}</label>

                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        wire:model.defer='password' autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>



                                <div class="col-md-6">
                                    <label for="password-confirm"
                                        class=" text-md-end">{{ __('Confirm Password') }}</label>

                                    <input id="password-confirm" type="password" class="form-control"
                                        wire:model.defer='password_confirmation' autocomplete="new-password">
                                </div>

                            </div>




                        </fieldset>


                        <fieldset class="form-group border p-3 mb-3">
                            <legend class="w-auto px-2">Parent Information</legend>

                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <label for="parents_name" class=" text-md-end">{{ __('Parents Name') }}</label>

                                    <input id="parents_name" type="text"
                                        class="form-control @error('parents_name') is-invalid @enderror"
                                        wire:model.defer='parents_name' autocomplete="parents_name" autofocus>

                                    @error('parents_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="parents_email" class=" text-md-end">{{ __('Parents Email') }}</label>

                                    <input id="parents_email" type="email"
                                        class="form-control @error('parents_email') is-invalid @enderror"
                                        wire:model.defer='parents_email' autocomplete="parents_email" autofocus>

                                    @error('parents_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>


                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="parents_phone" class=" text-md-end">{{ __('Parents Phone') }}</label>

                                    <input id="parents_phone" type="tel"
                                        class="form-control @error('parents_phone') is-invalid @enderror"
                                        wire:model.defer='parents_phone' autocomplete="parents_phone" autofocus>

                                    @error('parents_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>



                        </fieldset>

                        <fieldset class="form-group border p-3 mb-3">

                            <legend class="w-auto">Emergency Contact Info</legend>



                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <label for="emergency_contact_name"
                                        class=" text-md-end">{{ __('Emergency Contact Name') }}</label>

                                    <input id="emergency_contact_name" type="text"
                                        class="form-control @error('emergency_contact_name') is-invalid @enderror"
                                        wire:model.defer='emergency_contact_name' autocomplete="emergency_contact_name"
                                        autofocus>

                                    @error('emergency_contact_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                    <label for="emergency_contact_phone"
                                        class=" text-md-end">{{ __('Emergency Contact Phone') }}</label>

                                    <input id="emergency_contact_phone" type="tel"
                                        class="form-control @error('emergency_contact_phone') is-invalid @enderror"
                                        wire:model.defer='emergency_contact_phone'
                                        autocomplete="emergency_contact_phone" autofocus>

                                    @error('emergency_contact_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>




                            </div>

                        </fieldset>

                        <div class="text-center">

                            <button type="submit" class="btn btn-primary mr-4">
                                {{ __('Register') }}
                            </button>

                        </div>


                        <div class="text-center mt-2">
                            <a class="btn btn-link" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
