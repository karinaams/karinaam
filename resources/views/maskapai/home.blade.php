<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('MASKAPAI') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("welcome to Maskapai Page!") }}
                </div>
                <div class="p-6 text-gray-900">
                    {{ __("If you want to see flights data or add flight u can click the Dashboard on navigation.") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ route('flight.add') }}" class="btn btn-active btn-primary">
                ADD FLIGHT
            </a>
            <a href="" class="btn btn-active btn-primary">
                {{ route('maskapai.laporan.pending') }}
                LAPORAN
            </a>
        </h2>
    </x-slot> --}}

    {{-- <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                    {{ __("FLIGHTS") }}
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="overflow-x-auto">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
            <div class="p-6 text-black dark:text-gray-100">
            <table class="table">

                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name Airline</th>
                        <th>No Flight</th>
                        <th>Departure City</th>
                        <th>Departure Date</th>
                        <th>Departure Time</th>
                        <th>Arrival City</th>
                        <th>Arrival Date</th>
                        <th>Arrival Time</th>
                        <th>Seat Available</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($flights as $flight)
                <tbody>
                    <tr class="bg-base-200">
                        <th>{{ $loop->iteration }}</th>
                        <th>{{ $flight->airline->name }}</th>
                        <td>{{ $flight->no_flight }}</td>
                        <td>{{ $flight->departure_city }}</td>
                        <td>{{ $flight->departure_date }}</td>
                        <td>{{ $flight->departure_time }}</td>
                        <td>{{ $flight->arrival_city }}</td>
                        <td>{{ $flight->arrival_date }}</td>
                        <td>{{ $flight->arrival_time }}</td>
                        <td>{{ $flight->seat_availability }}</td>
                        <td>{{ $flight->price }}</td>
                        <td>
                            <a href="" class="btn btn-warning my-3">Edit</a> 
                            {{ route('flight.edit', ['id' => $flight->id]) }}
                            <form action="{{ route('flight.delete', ['id' => $flight->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this flight?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            @endforeach
            </table>
        </div>
    </div>
</x-app-layout> --}}
