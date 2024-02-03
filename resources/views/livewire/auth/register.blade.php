<div>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('assets/auth/images/img-01.png') }}" alt="IMG">
                </div>

                <form class="login100-form validate-form">
					<span class="login100-form-title">
						Register
					</span>

                    <div class="wrap-input100 validate-input @error('email') alert-validate @enderror" @error('email') data-validate="{{ $message }}" @enderror>
                        <input class="input100" wire:model="email" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="wrap-input100 validate-input @error('name') alert-validate @enderror" @error('name') data-validate="{{ $message }}" @enderror>
                        <input class="input100" wire:model="name" type="text" name="name" placeholder="Name">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="wrap-input100 validate-input @error('password') alert-validate @enderror" @error('password') data-validate="{{ $message }}" @enderror>
                        <input wire:model="password" class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="wrap-input100 validate-input @error('confirmPassword') alert-validate @enderror" @error('confirmPassword') data-validate="{{ $message }}" @enderror>
                        <input wire:model="confirmPassword" class="input100" type="password" name="c-pass" placeholder="Confirm Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="button" wire:click="register()" class="login100-form-btn">
                            Register
                        </button>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="{{ route('login') }}">
                            Login to your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
