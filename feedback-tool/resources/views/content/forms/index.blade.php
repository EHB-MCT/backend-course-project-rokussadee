
<x-app-layout>
    <x-slot name="header" class="flex flex-row justify-between">
            <div class="flex justify-between">
                <div class="flex">
                    <h2 class="flex font-semibold text-xl text-gray-800 leading-tight hidden sm:flex sm:items-center">
                                Forms
                    </h2>

                </div>

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <h3 class="flex">
                        Sort By
                    </h3>
                </div>

            </div>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="py-12 flex flex-wrap justify-between">
        @if($forms)
            @foreach($forms as $form)
                <div class="bg-gray-100 pb-6">

                    <!-- card a -->

                    <div class="bg-white p-8 rounded-lg shadow-lg shadow-neutral-200 w-96">
                        <!-- header -->
                        <div class="flex justify-between mb-4">
                            <div>
                                <p class="text-lg font-semibold text-neutral-700">{{$form->title}}</p>
                                <p class="mt-0.5  text-neutral-400 text-sm"></p>
                            </div>
                            @can('user_management_access')
                            <div class="text-right">
                                <p class="mt-1.5 text-neutral-400 text-sm">{{$form->user->name}}</p>
                            </div>
                            @endcan
                        </div>
                        <!-- bedge -->
                        <span class="text-green-500 px-3 text-sm py-1.5 bg-green-50 rounded-lg font-semibold">{{count($form->questions)}} questions</span>


                        <div class="flex items-center justify-between mt-5">
                            <div class="flex items-center">
                                <span class="text-neutral-400 text-sm">Added {{now()->diff($form->created_at)->format('%d d')}} ago.</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-neutral-400 text-sm">0</span>
                            </div>

                        </div>

                        <!-- body -->
                        <div class="mt-5 border-t border-dashed space-y-4 py-4">
                            <!-- item 1 -->
                            <div class="flex-col justify-between">
                                @foreach($form->questions as $question)
                                <div class="pb-4">
                                    <p class="text-lg text-neutral-600">{{$question->title}}</p>
                                    <div class="flex-row">
                                        @foreach ($question->categories as $cat)
{{--                                            <p class="mt-1 text-sm text-neutral-400 bg-green-50 rounded-lg font-semibold px-3 py-1.5" >--}}
{{--                                                {{$cat->title}}--}}
{{--                                            </p>--}}
                                            <p class="inline-block mt-1 text-neutral-400 px-3 text-sm bg-green-50 rounded-lg font-semibold py-1.5">{{$cat->title}}</p>

                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="text-center py-0.5 bg-neutral-100 text-neutral-400 font-semibold rounded-lg mt-3">+1 more</div>
                    </div>


                </div>
            @endforeach
        @endif

    </div>
    </div>
</x-app-layout>

