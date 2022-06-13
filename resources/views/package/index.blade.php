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
                    Id
                  </th>
                  <th scope="col" class="py-3 px-6 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-400">
                    Owner
                  </th>
                  <th scope="col" class="py-3 px-6 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-400">
                    Weight (kg)
                  </th>
                  <th scope="col" class="py-3 px-6 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-400">
                    Status
                  </th>
                  <th scope="col" class="p-4">
                    <span class="sr-only"></span>
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($packages as $package)
                  <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td class="whitespace-nowrap py-4 px-6 text-sm font-medium text-gray-900 dark:text-white">
                      {{ $package->id }}
                    </td>
                    <td class="whitespace-nowrap py-4 px-6 text-sm font-medium text-gray-900 dark:text-white">
                      {{ $package->owner }}
                    </td>
                    <td class="whitespace-nowrap py-4 px-6 text-sm font-medium text-gray-500 dark:text-white">
                      {{ $package->weight }}
                    </td>
                    <td class="whitespace-nowrap py-4 px-6 text-sm font-medium text-gray-900 dark:text-white">
                      {{ $statuses[$package->status] }}
                    </td>
                    <td class="whitespace-nowrap py-4 px-6 text-right text-sm font-medium">
                      <form method="POST" action="{{ route('deliver.store', compact('package')) }}">
                        @csrf
                        <input type="hidden" name="package_id" value="{{ $package->id }}" />
                        <ul class="mt-4 flex flex-col md:mt-0 md:flex-row md:space-x-8 md:text-sm md:font-medium">
                          <li>
                            <button type="button" id="dropdownNavbarLink{{ $loop->index }}" data-dropdown-toggle="dropdownNavbar{{ $loop->index }}"
                              class="flex w-full items-center justify-between border-b border-gray-100 py-2 pl-3 pr-4 font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:text-white md:w-auto md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:bg-transparent">Deliver
                              <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                              </svg></button>
                            <div id="dropdownNavbar{{ $loop->index }}"
                              class="z-10 hidden w-44 divide-y divide-gray-100 rounded bg-white shadow dark:divide-gray-600 dark:bg-gray-700">
                              <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                @foreach ($carriers as $carrier => $class)
                                  <li>
                                    <button type="submit" name="carrier" value="{{ $carrier }}"
                                      class="block w-full px-4 py-2 text-left hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                      {{ $carrier }}
                                    </button>
                                  </li>
                                @endforeach
                              </ul>
                            </div>
                          </li>
                        </ul>
                      </form>
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
