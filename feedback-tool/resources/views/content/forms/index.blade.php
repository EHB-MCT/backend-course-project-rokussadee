
<x-app-layout>
    @include('partials.header', ['title' => 'All Forms', 'url' => 'content.createform'])

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="py-12 flex flex-wrap justify-between">
                <div class="bg-gray-100 pb-6">

                    <div class="relative bg-gradient-to-tl from-blue-700 via-blue-500 to-blue-500 p-8 rounded-lg shadow-lg w-96 h-96">
                        <!-- header -->
                        <div class="">
                            <div class="absolute top-0 left-0 w-96 h-96 border-4 border-blue-500 blur-sm group-hover:blur-lg z-o pointer-events-none hover:duration-500"></div>
                            <div class="absolute top-72 left-72 h-24 w-24 bg-gradient-to-tl from-transparent via-transparent to-blue-900 rounded-2xl blur-sm"></div>
                            <div class="absolute top-72 left-72 h-24 w-24 shadow-inner shadow-blue-600 bg-gradient-to-tr from-blue-600 via-transparent to-blue-600 rounded-tl-3xl rounded-br-md "></div>
                            <a href="{{route('content.createform')}}" class="group pointer-events-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-72 left-72 h-24 w-24 text-blue-600 text-white group-hover:rotate-180 duration-1000"  fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                            </a>
                        </div>

                        <div class="flex justify-between">
                            <div>
                                <div class="w-48 h-8 shadow-inner shadow-blue-600 rounded-sm bg-gradient-to-br from-blue-600 via-blue-500 to-blue-500"></div>
                            </div>

                        </div>
                        <!-- bedge -->
                        <div class="flex justify-between" >
                            <div>
                                <div class="mt-2 w-32 h-8 shadow-inner shadow-blue-600 rounded-sm bg-gradient-to-br from-blue-600 via-blue-500 to-blue-500"></div>

                                <div class="mt-2 flex items-center justify-between">
                                    <div class="w-16 h-8 shadow-inner shadow-blue-600 rounded-sm bg-gradient-to-br from-blue-600 via-blue-500 to-blue-500"></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center" >
                                <div class="w-16 h-16 shadow-inner shadow-blue-600 rounded-sm bg-gradient-to-br from-blue-600 via-blue-500 to-blue-500"></div>
                            </div>
                        </div>


                        <!-- body -->
                        <div class="mt-4 border-t border-dashed space-y-4 py-4" >
                            <div class="mt-2 w-72 h-8 shadow-inner shadow-blue-600 rounded-sm bg-gradient-to-br from-blue-600 via-blue-500 to-blue-500"></div>
                            <div class="mt-2 w-24 h-8 shadow-inner shadow-blue-600 rounded-sm bg-gradient-to-br from-blue-600 via-blue-500 to-blue-500"></div>
                            <div class="mt-2 w-32 h-8 shadow-inner shadow-blue-600 rounded-sm bg-gradient-to-br from-blue-600 via-blue-500 to-blue-500"></div>
                            <a href="{{route('content.createform')}}" class="block text-lg font-semibold text-white hover:text-xl duration-500">Create a new form →</a>

                        </div>
                    </div>


                </div>
        @if(count($forms)>0)
            @foreach($forms as $form)
                <div class="bg-gray-100 pb-6">

                    <div class="bg-white p-8 rounded-lg shadow-lg shadow-neutral-200 w-96 ">
                        <!-- header -->
                        <div class="flex justify-between">
                            <div>
                                <a href="{{route('content.editform', ['form' => $form])}}" class="text-lg font-semibold text-neutral-700">{{$form->title}}</a>
                            </div>

                        </div>
                        <!-- bedge -->
                        <div class="flex justify-between" >
                            <div>
                                {{--                                @can('user_management_access')--}}
                                <p class="mt-1.5 text-neutral-400 text-sm">{{$form->user->name}}</p>
                                {{--                                @endcan--}}

                                <div class="flex items-center justify-between">
                                    <span class="text-neutral-400 text-sm">Added {{now()->diff($form->created_at)->format('%d d')}} ago.</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-center" >
                                <span class="text-green-500 px-3 text-sm py-1.5 bg-green-50 rounded-lg font-semibold">{{count($form->questions)}} questions</span>
                            </div>
                        </div>


                        <!-- body -->
                        <div class="mt-5 border-t border-dashed space-y-4 py-4" >
                            <!-- item 1 -->
                            <div class="flex-col justify-between">
                                @foreach($form->questions as $question)
                                    @if($loop->index < 2)
                                    <div class="pb-4">
                                        <p class="text-lg text-neutral-600">{{$question->title}}</p>
                                        <div class="flex-row">
                                            @foreach ($question->categories as $cat)
                                                <p class="inline-block mt-1 text-neutral-400 px-3 text-sm bg-green-50 rounded-lg font-semibold py-1.5">{{$cat->title}}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @if(count($form->questions) > 2)
                                    <a href="{{route('content.editform', ['form' => $form])}}" class="relative group pointer-events-auto mb-3">
                                        <div class="absolute -inset-1 bg-gradient-to-r from-white to-blue-500 rounded-lg blur opacity-0 group-hover:opacity-25 transition duration-300 group-hover:duration-200"></div>
                                        <div class="group-hover:border-opacity-0 group-hover:duration-300 duration-300 px-1 py-1 bg-white ring-1 ring-gray-900/5 rounded-lg leading-none flex justify-start items-center space-x-6">
                                            <div class="ml-1 text-blue-500 transition duration-200 group-hover:text-gray-800">+{{count($form->questions)-2}} more</div>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
    </div>
</x-app-layout>

