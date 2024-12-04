@extends('layouts.admin')

@section('content')
<h2 class="my-6 text-2xl font-semibold text-gray-700">
    Dashboard
</h2>

<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
    <!-- Card 1 -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
            </svg>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600">
                Total clients
            </p>
            <p class="text-lg font-semibold text-gray-700">
                6389
            </p>
        </div>
    </div>
    <!-- Card 2 -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600">
                Account balance
            </p>
            <p class="text-lg font-semibold text-gray-700">
                $ 46,760.89
            </p>
        </div>
    </div>
    <!-- Card 3 -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
        <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
            </svg>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600">
                New sales
            </p>
            <p class="text-lg font-semibold text-gray-700">
                376
            </p>
        </div>
    </div>
    <!-- Card 4 -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
        <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600">
                Pending contacts
            </p>
            <p class="text-lg font-semibold text-gray-700">
                35
            </p>
        </div>
    </div>
</div>

<!-- New Table -->
<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                    <th class="px-4 py-3">Client</th>
                    <th class="px-4 py-3">Amount</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Date</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y">
                <tr class="text-gray-700">
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/photo-1551069613-1904dbdcda11?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                                <p class="font-semibold">Sarah Curry</p>
                                <p class="text-xs text-gray-600">Designer</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        $ 86.00
                    </td>
                    <td class="px-4 py-3 text-xs">
                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full">
                            Approved
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        6/10/2020
                    </td>
                </tr>
                <!-- Add more table rows as needed -->
            </tbody>
        </table>
    </div>
</div>
@endsection