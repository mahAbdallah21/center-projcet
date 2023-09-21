<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{__('massages.courses')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="p-6 text-gray-900">
            <div class="flex justify-end p-5">
                <div>
                    <x-primary-link class="bg-blue-700 p=5 m=5" href="{{route('courses.create') }}">
                        {{__('massages.ADD NEW COURSE')}}
                        </x-primary-link>
                </div>
            </div>
            @if (session()->has('added'))
            <div>
                <div
                class="flex items-center justify-center px-2 py-1 m-1 font-medium text-green-500 bg-gray-700 border border-green-700 rounded-md ">
                    <div slot="avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="w-5 h-5 mx-2 feather feather-check-circle">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </div>
                    <div class="flex-initial max-w-full text-xl font-normal">
                        <div class="py-2">{{__('massages.This is a success messsage')}}
                            <div class="text-sm font-base">
                                {{ session('added') }}
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row-reverse flex-auto">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="w-5 h-5 ml-2 rounded-full cursor-pointer feather feather-x hover:text-green-400">
                                <line x1="18" y1="6" x2="6" y2="18">
                                </line>
                                <line x1="6" y1="6" x2="18" y2="18">
                                </line>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <
        @endif



                <div class="p-6 text-gray-900">
                    <section class="container px-4 mx-auto">
                        <div class="flex flex-col">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                            <thead class="bg-gray-50 dark:bg-gray-800">
                                                <tr>
                                                    <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                        <div class="flex items-center gap-x-3">
                                                            {{-- <input type="checkbox" class="text-blue-500 border-gray-300 rounded dark:bg-gray-900 dark:ring-offset-gray-900 dark:border-gray-700"> --}}
                                                            <button class="flex items-center gap-x-2">
                                                                <span>#</span>

                                                                <svg class="h-3" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                                                    <path d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                                                    <path d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z" fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </th>

                                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                        {{__('massages.Name')}}
                                                    </th>

                                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                       {{__('massages.hours')}}
                                                    </th>

                                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                          {{__('massages.price')}}
                                                    </th>

                                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                         {{__('massages.vendorName')}}
                                                    </th>
                                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                        {{__('massages.categoryName')}}
                                                   </th>
                                                   <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    {{__('massages.userName')}}
                                               </th>
                                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                        {{__('massages.Created At')}}
                                                    </th>

                                                    <th scope="col" class="relative py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                      {{__('massages.Actions')}}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                                <tr>
                                                    @forelse ( $courses as $key=> $course )
                                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap">
                                                        <div class="inline-flex items-center gap-x-3">


                                                            <span> {{$key + $courses->firstItem()}}</span>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{$course->name}}</td>
                                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 dark:bg-gray-800">
                                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10 3L4.5 8.5L2 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>

                                                            <h2 class="text-sm font-normal">{{$course->hours}}</h2>
                                                        </div>
                                                    </td>

                                                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{$course->price}}</td>
                                                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{$course->vendor->name}}</td>
                                                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{$course->category->name}}</td>

                                                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{$course->user_id }} </td>
                                                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{$course->created_at}}</td>
                                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                        <div class="flex items-center gap-x-6">
                                                            <form method="POST" action="{{ route('courses.destroy', $course->id) }}">

                                                            @method('DELETE')
                                                             @csrf
                                                            <button type="submit"
                                                            class="text-red-500 transition-colors duration-200 hover:text-red-900 focus:outline-none" >
                                                              {{__('massages.Delete')}}
                                                            </button>
                                                        </form>

                                                            <a href="{{ route('courses.edit', $course->id) }}"
                                                            class="text-blue-500 transition-colors duration-200 hover:text-indigo-500 focus:outline-none">
                                                               {{__('massages.Update')}}
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>



                                                @empty
                                                <td  colspan="5"  class="px-6 py-4 text-xs text-gray-200 uppercase b bg-gray-600">
                                                       <h3>{{__('massages.No Result Yet')}}</h3>
                                                </td>
                                                @endforelse


                                            </tbody>

                                        </table>
                                        {{ $courses->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>





                        </div>
                    </section>







                </div>

    </div>
</x-app-layout>
