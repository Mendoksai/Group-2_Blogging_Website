@props(['disabled' => false])

<textarea  oninput="this.style.height = '' ; this.style.height = this.scrollHeight + 'px'" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-gray-50 border border-white text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 resize-none overflow-y-hidden']) !!}>{{ $slot }}</textarea>
