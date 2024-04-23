<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="">{{ __('Airlines') }}</a>
        </h2>bg-yellow-500 text-white px-4 py-2 rounded-md
    </x-slot> --}}
    <x-slot name="header">
        <div class="flex">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mr-3">
            <a href="{{ route('admin.airlines')}}" class="btn btn-outline btn-primary">
                {{ __('AIRLINES') }}
            </a>
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('admin.laporan')}}" class="btn btn-outline btn-primary">
                {{ __('LAPORAN PEMBELIAN') }}
            </a>
        </h2>
    </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center" style="font-size: 20px">
                    {{ __("Account List") }}
                </div>
            </div>
        </div>
    </div>

    <style>
        .thead-spacing {
            margin-bottom: 10px; /* Anda dapat menyesuaikan nilai margin sesuai kebutuhan */
        }
    
        /* Atau menggunakan padding pada thead */
        /* .thead-spacing {
            padding-bottom: 10px;
        } */
    </style>
        <div class="max-w-7xl mx-auto lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="border-collapse table-auto w-full text-sm">
                        <thead class="" style="font-size: 18px;">
                            <th scope="col">NO</th>
                            <th scope="col">NAME</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">ROLE</th>
                            <th>ACTION</th>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row"> {{ $loop->iteration }}</th>
                                <th style="font-size: 13px">
                                    {{ $user->name }}
                                </th>
                                <th style="font-size: 13px">
                                    {{ $user->email }}
                                </th>
                                <th style="font-size: 13px">
                                    {{ $user->role }}
                                </th>
                                <th style="font-size: 12px">
                                    <a href="{{ route('admin.edit', ['id' => $user->id]) }}" class="btn btn-warning">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.delete', ['id' => $user->id]) }}" class="btn btn-error" type="submit">Delete</a>
                                </th>
                            </tr>
                            </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
{{-- {{ route('edit.editdata', ['id'=>$user->id]) }}{{ route('admin.delete', ['id' => $users->id]) }} --}}