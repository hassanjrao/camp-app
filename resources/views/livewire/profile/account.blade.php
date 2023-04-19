<div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-header">{{ __('Profile Information') }}</div>

                    <div class="card-body">
                        <form wire:submit.prevent='updateProfile'>


                            <div class="row mb-3">

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



                            {{-- <div class="row mb-3">

                                <div class="col-md-6">
                                    <label for="selectedCamp" class=" text-md-end">{{ __('Camp') }}</label>

                                    <select wire:model.defer='selectedCamp'
                                        class="form-select @error('selectedCamp') is-invalid @enderror">
                                        <option value="">Select Camp</option>
                                        @foreach ($camps as $camp)
                                            <option value="{{ $camp['id'] }}">{{ $camp['name'] }}</option>
                                        @endforeach
                                    </select>


                                    @error('selectedCamp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

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


                            </div> --}}


                            <div class="row mb-3">

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


                            </div>




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


                            <div class="text-center">

                                <button type="submit" class="btn btn-primary mr-4">
                                    {{ __('Update') }}
                                </button>

                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
