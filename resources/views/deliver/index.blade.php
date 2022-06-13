@extends('layout')

@section('content')
  <div class="mx-auto max-w-2xl">
    <div class="flex flex-col">
      <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <div class="inline-block min-w-full align-middle">
          <div class="overflow-hidden">
            <table class="min-w-full table-fixed divide-y divide-gray-200 dark:divide-gray-700">
              <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                  <th scope="col" class="py-3 px-6 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-400">
                    package_id
                  </th>
                  <th scope="col" class="py-3 px-6 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-400">
                    Carrier
                  </th>
                  <th scope="col" class="py-3 px-6 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-400">
                    Price (RUB)
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($deliveries as $deliver)
                  <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td class="whitespace-nowrap py-4 px-6 text-sm font-medium text-gray-900 dark:text-white">
                      {{ $deliver->package_id }}
                    </td>
                    <td class="whitespace-nowrap py-4 px-6 text-sm font-medium text-gray-500 dark:text-white">
                      {{ $deliver->carrier }}
                    </td>
                    <td class="whitespace-nowrap py-4 px-6 text-sm font-medium text-gray-900 dark:text-white">
                      {{ $deliver->price }}
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
@endsection
