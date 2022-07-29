<x-app-layout>
    @include('partials.header', ['title' => 'Form result: ' . $formresult->respondent])

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="py-12 flex flex-wrap justify-between">
                <div class="bg-gray-100 pb-6 w-full">
                <!-- card a -->

                    <div class="bg-white p-8 rounded-lg shadow-lg shadow-neutral-200">
                        <!-- header -->
                        <div>
                            <p class="text-xl font-semibold text-neutral-700"><i>{{$formresult->respondent}}</i>'s form result on {{$form->title}}</p>
                        </div>
                        <div class="flex justify-between" >
                            <div>
                                <p class="mt-1.5 text-neutral-400 text-sm"><span class=font-bold>By: </span>{{$formresult->user->name}}</p>
                                <p class=" text-neutral-400 text-sm"><span class=font-bold>Respondent: </span>{{$session->respondent}}</p>
                                <p class=" text-neutral-400 text-sm"><span class=font-bold>In session: </span>{{$session->title}}</p>



                                <div class="flex items-center justify-between">
                                    <span class="text-neutral-400 text-sm">Form completed {{now()->diff($formresult->created_at)->format('%d d')}} ago.</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-center">
                                <span class="text-green-500 px-3 text-sm py-1.5 bg-green-50 rounded-lg font-semibold">{{count($questions)}} questions</span>
                            </div>
                        </div>
                        <!-- bedge -->
                        <div class="mt-4">
                            <p class="text-neutral-400 text-lg">
                                {{$form->description}}
                            </p>
                        </div>


                        <!-- body -->
                        <div class="mt-5 border-t border-dashed space-y-4 py-4">
                            <!-- item 1 -->
                            <div class="flex-col justify-between">
                                @foreach($questions as $index=>$question)
                                    <div class="bg-white p-8 rounded-lg border border-neutral-100 mb-4">
                                        <div class="flex justify-between pb-4">
                                            <div class="pb-1">
                                                <p class="text-lg text-neutral-600">{{$question->title}}</p>
                                            </div>
                                            <div class="float-right">
                                                <div class="flex-row">
                                                    @foreach(json_decode($question->options) as $option)
                                                            <div class="form-check form-check-inline">
                                                                <input @if(array_values(json_decode($formresult->answers, true))[$index] == $option) checked @endif class="form-check-input focus:outline-none rounded-full h-4 w-4 border border-gray-300 transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" readonly type="radio" name="q{{$question->id}}" id="{{$question->id}}-{{$option}}" value="{{$option}}">
                                                                <label class="form-check-label inline-block text-gray-800" for="{{$question->id}}-{{$option}}">{{$option}}</label>
                                                            </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex">
                                            @foreach ($question->categories as $cat)
                                                <p class="inline-block mr-2 text-neutral-400 px-3 text-sm bg-green-50 rounded-lg font-semibold py-1.5 float-left">{{$cat->title}}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</x-app-layout>
