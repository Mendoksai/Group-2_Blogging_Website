<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                class="text-white w-full p-2 bg-green-700 rounded-lg mb-2 font-bold text-center">
                {{ __('Update Completed') }}</p>
                
                @elseif (session('status') === 'no-changes')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                    class="text-black w-full p-2 bg-blue-500 rounded-lg mb-2 font-bold text-center">
                    {{ __('No changes were made.') }}</p>
                    @elseif (session('status') === 'pic-success')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                    class="text-black w-full p-2 bg-green-700 rounded-lg mb-2 font-bold text-center">
                    {{ __('Uploading profile pictures success.') }}</p>
        @endif
        

        <div>
            <x-input-label for="profile_picture" :value="__('Profile Picture')" />
            @if (Auth::user()->profile_picture)
                <img class="w-40 h-40 rounded-full object-cover" src="{{ asset(Auth::user()->profile_picture) }}"
                    alt="Profile picture img">
            @else
                <img class="w-40 h-40 rounded-full object-cover" src="{{ asset('imgs/default_profile.jpg') }}"
                    alt="default profile picture">
                    <div class="rounded-lg bg-blue-400 flex flex-row items-center p-1">
                        <svg class="px-3" width="60" height="60" fill="black" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2.625c-5.17 0-9.375 4.206-9.375 9.375 0 5.17 4.206 9.375 9.375 9.375 5.17 0 9.375-4.206 9.375-9.375 0-5.17-4.206-9.375-9.375-9.375Zm0 3.844a1.219 1.219 0 1 1 0 2.437 1.219 1.219 0 0 1 0-2.437Zm2.25 10.593h-4.125a.75.75 0 1 1 0-1.5h1.313v-4.124h-.75a.75.75 0 1 1 0-1.5h1.5a.75.75 0 0 1 .75.75v4.874h1.312a.75.75 0 1 1 0 1.5Z"></path>
                        </svg>
                        <div class="flex flex-col">
                            <h1 class="text-base font-bold">Info</h1>
                            <h1 class="text-xs">Profile picture is empty. You can upload your profile picture anytime.</h1>
                        </div>
                    </div>
            @endif
            <input id="profile_picture" name="profile_picture" type="file" class="mt-1 block w-full"
                accept="image/*" />
            <x-input-error class="mt-2" :messages="$errors->get('profile_picture')" />
        </div>


        <div class="flex flex-col md:flex-row">
            <div class="w-full md:auto md:mr-2">
                <x-input-label for="first_name" :value="__('First name')" />
                <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full"
                    :value="old('first_name', $user->first_name)" required autofocus autocomplete="first_name" />
                <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
            </div>
            <div class="w-full ">
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $user->last_name)"
                    required autofocus autocomplete="last_name" />
                <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
            </div>
        </div>

        <div class="">
            <x-input-label for="student_instructor_id" :value="__('First name')" />
            <x-text-input id="student_instructor_id" name="student_instructor_id" type="text"
                class="mt-1 block w-full" :value="old('student_instructor_id', $user->student_instructor_id)" required autofocus autocomplete="student_instructor_id" />
            <x-input-error class="mt-2" :messages="$errors->get('student_instructor_id')" />
        </div>

        {{-- role --}}
        <div>
            <div class="text-white">
                <x-input-label for="account_role" :value="__('Account Role')" />
                <div class="flex gap-2">
                    <label class="inline-flex items-center">
                        <input type="radio" id="account_role_student" name="account_role" value="student">
                        <span class="ml-2">Student</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" id="account_role_instructor" name="account_role" value="instructor">
                        <span class="ml-2">Instructor</span>
                    </label>
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('account_role')" />
            </div>
        </div>

        {{-- <div class="w-full">
            <div class="mt-4 relative">
                <x-input-label for="degree_name" :value="__('Degree Name')" />
                <x-select name="degree_name"
                    class="block appearance-none w-full bg-white border border-gray-300 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">Select a program</option>
                    <option value="bsit" >bSIT
                    </option>
                    <option value="bsba" >BSBA
                    </option>
                    <option value="beed" >BEED
                    </option>
                </x-select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9 11l3 3l3-3m0-4l-3 3l-3-3" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <x-input-error :messages="$errors->get('degree_name')" class="mt-2" />
            </div>
        </div> --}}







        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>


        </div>
    </form>
</section>
