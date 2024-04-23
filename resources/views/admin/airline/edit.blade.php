<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{-- {{ __('Admin Dashboard') }} --}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                    {{ __("EDIT AIRLINES") }}
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('airline.update', $airlines->id) }}" method="POST">
            @csrf
            <div class="form-control mt-3">
                <label for="name">Airlines Name</label>
                <input type="text" class="input input-bordered w-full max-w-xs" name="name" id="name" value="{{ $airlines->name }}">
            </div>
            <div class="form-control mt-3">
                <button type="submit" class="btn btn-success w-full max-w-xs">
                    Save
                </button>
            </div>
        </form>
        </div>
    </x-app-layout>
