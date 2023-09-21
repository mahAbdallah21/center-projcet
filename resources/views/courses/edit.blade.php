<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Courses
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="  flex  items-center justify-center  bg-gray-50">
                        <div>

                          <h1 class="mb-1 font-bold text-3xl flex gap-1 items-baseline font-mono">Update<span class="text-sm text-purple-700">course</sm></h1>
                      <div class="grid max-w-3xl gap-2 py-10 px-8 sm:grid-cols-2 bg-white rounded-md border-t-4 border-purple-400">


                        <form method="POST" action="{{route('courses.update' , $course->id)}}">
                            @method('patch')
                            @csrf

                        <div class="grid">
                          <div class="bg-white first:flex min-h-[60px] flex-col-reverse justify-center rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:shadow-inner">
                            <input type="text" name="name" value="{{old('name', $course->name)}}" id="name" class="peer block w-full border-0 p-0 text-base text-gray-900 placeholder-gray-400 focus:ring-0" placeholder="name" />
                            <label html="name" class="block transform text-xs font-bold uppercase text-gray-400 transition-opacity, duration-200 peer-placeholder-shown:h-0 peer-placeholder-shown:-translate-y-full peer-placeholder-shown:opacity-0">name</label>
                            @error('name')
                            <div class="font-bold text-red-600">{{ $message }}</div>
                        @enderror

                          </div>
                        </div>
                          <div class="grid">
                          <div class="bg-white flex min-h-[60px] flex-col-reverse justify-center rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:shadow-inner">
                            <input type="text" name="price" value="{{old('price', $course->price)}}" id="price" class="peer block w-full border-0 p-0 text-base text-gray-900 placeholder-gray-400 focus:ring-0" placeholder="price" />
                            <label html="price" class="block transform text-xs font-bold uppercase text-gray-400 transition-opacity, duration-200 peer-placeholder-shown:h-0 peer-placeholder-shown:-translate-y-full peer-placeholder-shown:opacity-0">price</label>
                            @error('price')
                            <div class="font-bold text-red-600">{{ $message }}</div>
                        @enderror

                          </div>
                        </div>
                        <div class="grid">
                            <div class="bg-white flex min-h-[60px] flex-col-reverse justify-center rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:shadow-inner">
                              <select name="user_id">
                                  <option disabled selected value="">Select user</option>

                                  @foreach ( App\Models\user::orderBy('name')->pluck('name' , 'id')->toArray() as $id => $name)
                                      <option {{ $id == old('user_id', $course->user_id) ? 'selected' : '' }} value="{{ $id }}">{{ $name }}</option>
                                  @endforeach
                              </select>
                              <label html="name" class="block transform text-xs font-bold uppercase text-gray-400 transition-opacity, duration-200 peer-placeholder-shown:h-0 peer-placeholder-shown:-translate-y-full peer-placeholder-shown:opacity-0">user name</label>
                              @error('name-user')
                              <div class="font-bold text-red-600">{{ $message }}</div>
                          @enderror

                            </div>
                          </div>
                          <div class="grid">
                            <div class="bg-white flex min-h-[60px] flex-col-reverse justify-center rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:shadow-inner">
                              <select name="category_id">
                                  <option disabled selected value="">Select category</option>

                                  @foreach ( App\Models\category::orderBy('name')->pluck('name' , 'id')->toArray() as $id => $name)
                                      <option {{ $id == old('category_id', $course->category_id ) ? 'selected' : '' }} value="{{ $id }}">{{ $name }}</option>
                                  @endforeach
                              </select>
                              <label html="category" class="block transform text-xs font-bold uppercase text-gray-400 transition-opacity, duration-200 peer-placeholder-shown:h-0 peer-placeholder-shown:-translate-y-full peer-placeholder-shown:opacity-0">category</label>
                              @error('category')
                              <div class="font-bold text-red-600">{{ $message }}</div>
                          @enderror

                            </div>
                          </div>
                          <div class="grid">
                            <div class="bg-white flex min-h-[60px]  flex-col-reverse justify-center rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:shadow-inner">
                              <select name="vendor_id">
                                  <option disabled selected value="">Select vendor</option>

                                  @foreach ( App\Models\vendor::orderBy('name')->pluck('name' , 'id')->toArray() as $id => $name)
                                      <option {{ $id == old('vendor_id', $course->vendor_id) ? 'selected' : '' }} value="{{ $id }}">{{ $name }}</option>
                                  @endforeach
                              </select>
                              <label html="vendor" class="block transform text-xs font-bold uppercase text-gray-400 transition-opacity, duration-200 peer-placeholder-shown:h-0 peer-placeholder-shown:-translate-y-full peer-placeholder-shown:opacity-0">vendor</label>
                              @error('vendor')
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
