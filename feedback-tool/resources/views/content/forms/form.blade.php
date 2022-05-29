<x-app-layout>
    <x-slot name="header" class="flex flex-row justify-between">
            <div class="flex justify-between">
                <div class="flex">
                    <h2 class="flex font-semibold text-xl text-gray-800 leading-tight hidden sm:flex sm:items-center">
                                Form: {{$form->title}}
                    </h2>

                </div>

            </div>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="py-12 flex flex-wrap justify-between">
        @if($form)
                <div class="bg-gray-100 pb-6  w-full">

                    <!-- card a -->

                    <div class="bg-white p-8 rounded-lg shadow-lg shadow-neutral-200">
                        <!-- header -->
                        <div class="flex justify-between mb-4">
                            <div>
                                <p class="text-xl font-semibold text-neutral-700">{{$form->title}}</p>
                                <p class="mt-0.5  text-neutral-400 text-sm"></p>
                            </div>
                            <span class="text-green-500 px-3 text-sm py-1.5 bg-green-50 rounded-lg font-semibold">{{count($form->questions)}} vragen</span>

                        @can('user_management_access')
                            <div class="text-right">
                                <p class="mt-1.5 text-neutral-400 text-sm">{{$form->user->name}}</p>
                            </div>
                            @endcan
                        </div>
                        <!-- bedge -->
                        <div>
                            <p class="text-neutral-400 text-lg">
                                {{$form->description}}
                            </p>
                        </div>

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
                                @foreach($questions as $question)
                                    <div class="flex justify-between">
                                        <div class="pb-4">
                                            <p class="text-lg text-neutral-600">{{$question->title}}</p>
                                        </div>
                                        <div class="float-right">
                                            <div class="flex-row">
                                                @foreach ($question->categories as $cat)
                                                    <p class="inline-block mt-1 text-neutral-400 px-3 text-sm bg-green-50 rounded-lg font-semibold py-1.5">{{$cat->title}}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex justify-center">
                                        @foreach(json_decode($question->options) as $option)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="Question {{$question->id}}" id="{{$option}}" value="{{$option}}">
                                            <label class="form-check-label inline-block text-gray-800" for="{{$option}}">{{$option}}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="text-center py-0.5 bg-neutral-100 text-neutral-400 font-semibold rounded-lg mt-3">+1 more</div>
                    </div>


                </div>
        @endif

    </div>
    </div>
</x-app-layout>
