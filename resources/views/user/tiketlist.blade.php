<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List tiket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-center font-semibold">List Tiket Yang di pesan</h2>
                    <div class="overflow-x-auto">
                        <table class="table">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th>No.Booking</th>
                                    <th>No.Penerbangan</th>
                                    <th>Nama Pemesan</th>
                                    <th>Nama Penumpang</th>
                                    <th>Departure City</th>
                                    <th>Arrival City</th>
                                    <th>Departure Date</th>
                                    <th>Arrival Date</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->no_booking }}</td>
                                        <td>{{ $transaction->flight->no_flight }}</td>
                                        <td>{{ $transaction->customer_name }}</td>
                                        <td>{{ $transaction->passanger_name }}</td>
                                        <td>{{ $transaction->flight->departure_city }}</td>
                                        <td>{{ $transaction->flight->arrival_city }}</td>
                                        <td>{{ $transaction->flight->departure_date }}</td>
                                        <td>{{ $transaction->flight->arrival_date }}</td>
                                        <td>{{ $transaction->total_price }}</td>
                                        <td>{{ $transaction->payment_status }}</td>
                                        <td>
                                            <a href="" class="btn btn-error ">Cancel</a>
                                        {{-- {{ route('User.detail_pemesan', ['id' => $transaction->id]) }} --}}
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>