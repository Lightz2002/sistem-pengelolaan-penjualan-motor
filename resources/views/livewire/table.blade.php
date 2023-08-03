<div class="output">
    {{-- Search Bar --}}
    <div class="mb-4 flex items-baseline justify-evenly">
        <div class="w-1/2 relative">

            <input wire:model="search" name="search" type="search" placeholder="Search..."
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="stroke-slate-400 w-6 h-6 absolute top-1/2 right-5 translate-y-[-50%]">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>

        </div>
        <x-primary-button type="redirect" class="ml-auto" href="/users/create">Create</x-primary-button>

    </div>

    {{-- Table --}}

    <div class="mb-4  overflow-hidden rounded-lg shadow-md">
        <table class="table-auto w-full  text-left  border-slate-200">
            <thead>
                <tr>
                    @foreach ($this->columns() as $column)
                        <th class="p-3 border-b border-slate-200 bg-slate-200 text-slate-500">
                            {{ $column->label }}
                        </th>
                    @endforeach

                </tr>
            </thead>
            <tbody>
                @foreach ($this->data() as $row)
                    <tr>
                        @foreach ($this->columns() as $column)
                            <td class="p-3 border-b cursor-pointer border-slate-200">
                                {{-- <div class="py-3 px-6 flex items-center cursor-pointer"> --}}
                                <x-dynamic-component :component="$column->component" :value="$row[$column->key]">
                                </x-dynamic-component>
                                {{-- </div> --}}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
    </div>

    {{-- Pagination --}}
    {{ $this->data()->withQueryString()->links() }}
</div>

