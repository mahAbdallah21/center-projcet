<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Vendors
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="  flex  items-center justify-center  bg-gray-50">
                        <div>

                          <h1 class="mb-1 font-bold text-3xl flex gap-1 items-baseline font-mono">Add<span class="text-sm text-purple-700">Vender</sm></h1>
                      <div class="grid max-w-3xl gap-2 py-10 px-8 sm:grid-cols-2 bg-white rounded-md border-t-4 border-purple-400">


                        <form method="POST" enctype="multipart/form-data" action="{{route('vendors.store')}}">

                            @csrf

                            <label html="name" class="block transform text-xs font-bold uppercase text-gray-400 transition-opacity, duration-200 peer-placeholder-shown:h-0 peer-placeholder-shown:-translate-y-full peer-placeholder-shown:opacity-0">name</label>
                            <input type="text" name="name" value="{{old('name')}}" id="name" class="peer block w-full border-0 p-0 text-base text-gray-900 placeholder-gray-400 focus:ring-0" placeholder="name" />
                            @error('name')
                            <div class="font-bold text-red-600">{{ $message }}</div>
                        @enderror

                          </div>
                        </div>
                        <div class="grid">
                          <div class="bg-white first:flex min-h-[60px] flex-col-reverse justify-center rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:shadow-inner">
                            <input type="file" name="logo" value="{{old('logo')}}" id="logo" class="peer block w-full border-0 p-0 text-base text-gray-900 placeholder-gray-400 focus:ring-0" placeholder="logo" />
                            <label html="logo" class="block transform text-xs font-bold uppercase text-gray-400 transition-opacity, duration-200 peer-placeholder-shown:h-0 peer-placeholder-shown:-translate-y-full peer-placeholder-shown:opacity-0">logo</label>
                            @error('logo')
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
