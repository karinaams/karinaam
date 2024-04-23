<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class=" text-xl my-5 font-semibold text-gray-800">
                {{ __('Detail Pemesan') }}
            </h2>
            <form action="{{ route('User.buy.store', $flights->id) }}" class="form-control flex" method="POST">
                {{--  --}}
                @csrf
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-5">
                    <div class="p-6 text-gray-900">
                            <input type="hidden" name="no_booking" class="input input-bordered w-full" value="{{ $no_booking }}" />
                            <input type="text" name="user_id"class="input input-bordered w-full"value="{{ auth()->user()->id }}" />
                        <div class="form-control mb-3">
                            <label for="customer_name" class="font-semibold">Customer Name</label>
                            <input type="text" name="customer_name" class="input input-bordered w-full" value="{{ auth()->user()->name }}"/>
                        </div>
                        <div class="form-control mb-3">
                            <label for="phone_number" class="font-semibold">Phone Number</label>
                            <input type="text" name="phone_number" class="input input-bordered w-full" placeholder="Harap isi phone number"/>
                        </div>
                        <div class="form-control mb-3">
                            <label for="email" class="font-semibold">Email</label>
                            <input type="text" name="email" class="input input-bordered w-full" value="{{ auth()->user()->email }}" />
                        </div>
                    </div>
                </div>
                <h2 class=" text-xl my-5 font-semibold text-gray-800">
                    {{ __('Detail Penumpang') }}
                </h2>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-5">
                    <div class="p-6 text-gray-900">
                        <div class="form-control mb-3">
                            <label for="passanger_name" class="font-semibold">Name Passanger</label>
                            <input type="text" name="passanger_name" class="input input-bordered w-full" />
                        </div>
                    </div>
                </div>
                <h2 class=" text-xl my-5 font-semibold text-gray-800">
                    {{ __('Detail Ticket') }}
                </h2>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-5">
                    <div class="p-6 text-gray-900">
                        <div class="form-control mb-3">
                            <div class="overflow-x-auto">

                                <table class="table">
                                    <!-- head -->
                                    <thead>
                                        <tr>
                                            <th>Nama Maskapai</th>
                                            <th>No.Penerbangan</th>
                                            <th>Departure City</th>
                                            <th>Arrival City</th>
                                            <th>Departure Date</th>
                                            <th>Arrival Date</th>
                                            <th>Departure Time</th>
                                            <th>Arrival Time</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>{{ $flights->airline->name }}</th>
                                            <td>{{ $flights->no_flight }}</td>
                                            <td>{{ $flights->departure_city }}</td>
                                            <td>{{ $flights->arrival_city }}</td>
                                            <td>{{ $flights->departure_date }}</td>
                                            <td>{{ $flights->arrival_date }}</td>
                                            <td>{{ $flights->departure_time }}</td>
                                            <td>{{ $flights->arrival_time }}</td>
                                            <td>Rp.{{ $flights->price }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <input type="hidden" name="flight_id" class="input input-bordered w-full"
                                value="{{ $flights->id }}" />
                            <input type="hidden" name="airline_id" class="input input-bordered w-full"
                                value="{{ $flights->airline->id }}" />
                            <input type="hidden" name="payment_status" class="input input-bordered w-full"
                                value="not_confirmed" />
                            <input type="hidden" name="total_price" class="input input-bordered w-full"
                                value="{{ $flights->price }}" />
                        </div>
                    </div>
                </div>
                <button class="btn btn-success w-full" type="submit">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>