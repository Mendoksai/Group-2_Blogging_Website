<x-guest-layout>
    <div class="h-screen w-screen relative">
        <img class="z-0 h-full w-full object-cover absolute inset-0"
            src="https://www.psu.edu.ph/wp-content/uploads/2016/10/urdaneta.jpg" alt="PSU background image">
        <div class=" z-10 bg-blue-950 text-white h-screen w-screen object-cover absolute opacity-75"></div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- this is the layout of login form -->
        <div class="z-20 flex items-center justify-center h-screen w-screen absolute md:h-auto md:w-auto">
            <div class="flex flex-col items-center justify-center  h-screen w-screen md:h-screen lg:py-0">
                <a href="#" class="flex items-center mb-6 text-2xl font-bold text-gray-900 dark:text-white">
                    <img class="w-8 h-8 mr-2"
                        src="https://upload.wikimedia.org/wikipedia/en/7/75/Pangasinan_State_University_logo.png"
                        alt="logo">
                    PSU BLOG
                </a>
                <div
                    class=" rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 bg-gray-800 bg-opacity-50 backdrop-blur-sm border-gray-500">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1
                            class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Sign in to your account
                        </h1>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="flex flex-col md:flex-row">
                                <!-- First name -->
                                <div class="w-full md:auto md:mr-2">
                                    <x-input-label for="first_name" :value="__('First name')" />
                                    <x-text-input id="first_name" class="block mt-1 w-full" type="text"
                                        name="first_name" :value="old('first_name')" placeholder="John" required autofocus
                                        autocomplete="first_name" />
                                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                                </div>

                                <!-- last name -->
                                <div class="w-full">
                                    <x-input-label for="last_name" :value="__('Last name')" />
                                    <x-text-input id="last_name" class="block mt-1 w-full" type="text"
                                        name="last_name" :value="old('last_name')" placeholder="Mendez" required autofocus
                                        autocomplete="last_name" />
                                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                                </div>
                            </div>
                            <!-- container -->
                            <div class="mt-4 flex flex-col md:flex-row">
                                <div class="w-full md:auto md:mr-2">
                                    <x-input-label for="student_instructor_id" :value="__('Student/ Instructor ID')" />
                                    <x-text-input id="student_instructor_id" class=" block mt-1 w-full capitalize"
                                        type="text" name="student_instructor_id" :value="old('student_instructor_id')" required
                                        autocomplete="student_instructor_id" placeholder="21-AC-0138" />
                                    <x-input-error :messages="$errors->get('student_instructor_id')" class="mt-2" />
                                </div>

                                <!-- last name -->
                                <div class="w-full">
                                    <x-input-label for="email" :value="__('Your email')" />
                                    <x-text-input placeholder="eemail@psu.edu.ph" id="email"
                                        class="block mt-1 w-full" type="email" name="email" email="email"
                                        :value="old('email')" required autofocus autocomplete="email" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row">
                                <!-- role -->
                                <div class="w-full md:auto md:mr-2">
                                    <div class="mt-4 text-white text-sm">
                                        <x-input-label for="account_role" :value="__('Account Role')" />
                                        <div class="flex gap-2">
                                            <label class="inline-flex items-center">
                                                <input type="radio" id="account_role" name="account_role"
                                                    value="student"
                                                    {{ old('role', 'student') === 'student' ? 'checked' : '' }}>
                                                <span class="ml-2">Student</span>
                                            </label>
                                            <label class="inline-flex items-center">
                                                <input type="radio" name="account_role" >
                                                <span class="ml-2">Instructor</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- dropdown menu -->
                                <div class="w-full">
                                    <div class="mt-4 relative">
                                        <x-input-label for="degree_name" :value="__('Degree Name')" />
                                        <x-select name="degree_name">
                                            <option value="">Select a program</option>
                                            <option value="bsit">bSIT</option>
                                            <option value="bsba">BSBA</option>
                                            <option value="beed">BEED</option>
                                        </x-select>
                                        <x-input-error :messages="$errors->get('degree_name')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                            <!-- password container -->
                            <div class="mt-4 flex flex-col md:flex-row">
                                <div class="w-full md:auto md:mr-2">
                                    <x-input-label for="password" :value="__('Password')" />

                                    <x-text-input id="password" class="block mt-1 w-full" type="password"
                                        name="password" placeholder="••••••••" required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- last name -->
                                <div class="w-full">
                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                        placeholder="••••••••" name="password_confirmation" required
                                        autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>

                            <p class=" mt-4 text-sm font-light text-gray-500 dark:text-gray-400">
                                Have an account yet? <a href="{{ route('login') }}"
                                    class="font-medium text-blue-600 hover:underline dark:text-blue-500">Log in</a>
                            </p>

                            <x-primary-button class="mt-4">
                                {{ __('Sign up') }}
                            </x-primary-button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

</x-guest-layout>
