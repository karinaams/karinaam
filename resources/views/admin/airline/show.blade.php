<x-app-layout>
    <x-slot name="header" class="flex items-center justify-between p-4 bg-gray-100 dark:bg-gray-800">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <a href="{{ route('admin.airline.create') }}" class="btn btn-outline btn-primary">
                    ADD AIRLINES
                </a>
            </h2>
        </div>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                    {{ __("LIST AIRLINES") }}
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto lg:px-8">
        <div class="overflow-x-auto">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <table class="table">
                  <thead style="font-size: 18px;">
                      <th scope="col">NO</th>
                      <th scope="col">AIRLINES NAME</th>
                      <th>ACTION</th>
                  </thead>
                  <tbody>
                    @foreach ($airlines as $airline)
                    <tr>
                        <th scope="row"> {{ $loop->iteration }}</th>
                        <th style="font-size: 13px">
                            {{ $airline->name }}
                        </th>
                        <th style="font-size: 12px">
                            <a href="{{route('airlines.edit', ['id' => $airline->id])}}" class="btn btn-warning">Edit</a>
                            {{--  --}}
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('airline.delete', ['id' => $airline->id]) }}" class="btn btn-error" type="submit">Delete</a>
                        {{--  --}}
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
        </div>
    </div>
</x-app-layout>