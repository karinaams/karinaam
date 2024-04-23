<x-app-layout>
    <x-slot name="header" class="flex items-center justify-between p-4 bg-gray-100 dark:bg-gray-800">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <a href="{{ route('admin.airlines') }}" class="btn btn-outline btn-primary">
                    AIRLINE LIST
                </a>
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                    {{ __("ADD AIRLINE") }}
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form action="{{ route('admin.airline.store') }}" method="POST">
            @csrf
            <div class="form-control mt-3">
                <label for="name">Airlines Name</label>
                <input type="text" class="input input-bordered max-w-xs" name="name" id="name" value="{{ old('name') }}">
            </div>
            <div class="form-control mt-3">
                <button type="submit" class="btn btn-success w-full max-w-xs">
                    Save
                </button>
            </div>
        </form>
    
        </div>
</x-app-layout>