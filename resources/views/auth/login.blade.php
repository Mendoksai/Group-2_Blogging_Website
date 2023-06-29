<x-guest-layout>
    <div class="h-screen w-screen relative">
        <img  
        class="z-0 h-full w-full object-cover absolute inset-0"
        src="https://www.psu.edu.ph/wp-content/uploads/2016/10/urdaneta.jpg" 
        alt="PSU background image">
        <div class=" z-10 bg-blue-950 text-white h-screen w-screen object-cover absolute opacity-75"></div>

        <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- this is the layout of login form -->
        <div class="z-20 flex items-center justify-center h-screen w-screen absolute">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <a href="#" class="flex items-center mb-6 text-2xl font-bold text-gray-900 dark:text-white">
                    <img class="w-8 h-8 mr-2" src="https://upload.wikimedia.org/wikipedia/en/7/75/Pangasinan_State_University_logo.png" alt="logo">
                    PSU BLOG    
                </a>
                <div class="w-full rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 bg-gray-800 bg-opacity-50 backdrop-blur-sm border-gray-500">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Sign in to your account
                        </h1>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Email Address -->
                            <div>
                                <x-input-label for="email" :value="__('Your Email')" />
                                <x-text-input placeholder="ename@psu.edu.ph" 
                                id="email" 
                                class="block mt-1 w-full" 
                                type="email" 
                                name="email" 
                                :value="old('email')" 
                                required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                             <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Password')" />

                                <x-text-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                placeholder="••••••••" 
                                                name="password"
                                                required autocomplete="current-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <div class="flex items-center h-5">
                                            <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" >
                                          </div>
                                          <div class="ml-2 text-sm">
                                            <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                          </div>
                                          {{-- password request --}}
                                          @if (Route::has('password.request'))
                                          <a 
                                            class=" pl-3 text-sm font-medium text-blue-600 hover:underline dark:text-blue-500" 
                                            href="{{ route('password.request') }}">
                                              {{ __('Forgot your password?') }}
                                          </a>
                                      @endif
                                    </div>
                                </div>
                            </div>
                                <x-primary-button class="mt-4">
                                    {{ __('Log in') }}
                                </x-primary-button>
                                <p class=" mt-4 text-sm font-light text-gray-500 dark:text-gray-400">
                                    Don’t have an account yet? <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Sign up</a>
                                </p>  
                        </form>                    
                    </div>
                </div>
            </div>
        </div>

</x-guest-layout>
