<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Companies
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="  flex  items-center justify-center  bg-gray-50">
                        <div>

                          <h1 class="mb-1 font-bold text-3xl flex gap-1 items-baseline font-mono">Add<span class="text-sm text-purple-700">company</sm></h1>
                      <div class="grid max-w-3xl gap-2 py-10 px-8 sm:grid-cols-2 bg-white rounded-md border-t-4 border-purple-400">
                                   {{-- @if ($errors->any())
                            <div>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-red-600">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                        <form method="POST" action="{{route('companies.store')}}">

                            @csrf
                        <div class="grid">
                          <div class="bg-white flex min-h-[60px] flex-col-reverse justify-center rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:shadow-inner">
                            <input type="text" name="name" value="{{old('name')}}" id="name" class="peer block w-full border-0 p-0 text-base text-gray-900 placeholder-gray-400 focus:ring-0" placeholder="name" />
                            <label html="name" class="block transform text-xs font-bold uppercase text-gray-400 transition-opacity, duration-200 peer-placeholder-shown:h-0 peer-placeholder-shown:-translate-y-full peer-placeholder-shown:opacity-0">name</label>
                            @error('name')
                            <div class="font-bold text-red-600">{{ $message }}</div>
                        @enderror

                          </div>
                        </div>
                        <div class="grid">
                          <div class="bg-white first:flex min-h-[60px] flex-col-reverse justify-center rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:shadow-inner">
                            <input type="text" name="owner" value="{{old('owner')}}" id="owner" class="peer block w-full border-0 p-0 text-base text-gray-900 placeholder-gray-400 focus:ring-0" placeholder="owner" />
                            <label html="owner" class="block transform text-xs font-bold uppercase text-gray-400 transition-opacity, duration-200 peer-placeholder-shown:h-0 peer-placeholder-shown:-translate-y-full peer-placeholder-shown:opacity-0">owner</label>
                            @error('owner')
                            <div class="font-bold text-red-600">{{ $message }}</div>
                        @enderror

                          </div>
                        </div>
                          <div class="grid">
                          <div class="bg-white flex min-h-[60px] flex-col-reverse justify-center rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:shadow-inner">
                            <input type="text" name="tax_nubmer" value="{{old('tax_nubmer')}}" id="tax_nubmer" class="peer block w-full border-0 p-0 text-base text-gray-900 placeholder-gray-400 focus:ring-0" placeholder="tax_nubmer" />
                            <label html="tax_nubmer" class="block transform text-xs font-bold uppercase text-gray-400 transition-opacity, duration-200 peer-placeholder-shown:h-0 peer-placeholder-shown:-translate-y-full peer-placeholder-shown:opacity-0">tax_nubmer</label>
                            @error('tax_nubmer')
                            <div class="font-bold text-red-600">{{ $message }}</div>
                        @enderror

                          </div>
                        </div>

                               <button type="submit" class="mt-4 bg-purple-500 text-white py-2 px-6 rounded-md hover:bg-purple-600 ">Save</button>

                      </div>
                    </form>
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
