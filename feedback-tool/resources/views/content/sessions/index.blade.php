
<x-app-layout>
    <x-slot name="header" class="flex flex-row justify-between">
        <div class="flex justify-between">
            <div class="flex">
                <h2 class="flex font-semibold text-xl text-gray-800 leading-tight hidden sm:flex sm:items-center">
                    Sessions
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
            @if($sessions)
                @foreach($sessions as $session)
                    <div class="bg-gray-100 pb-6">

                        <!-- card a -->

                        <div class="bg-white p-8 rounded-lg shadow-lg shadow-neutral-200 w-96">
                            <!-- header -->
                            <div class="flex justify-between">
                                <div>
                                    <p class="text-lg font-semibold text-neutral-700">{{$session->title}}</p>
                                </div>

                            </div>
                            <!-- bedge -->
                            <div class="flex justify-between" >
                                <div>
                                    @can('user_management_access')
                                        <p class="mt-1.5 text-neutral-400 text-sm"><span class=font-bold>By: </span>{{$session->user->name}}</p>
                                    @endcan
                                    <p class=" text-neutral-400 text-sm"><span class=font-bold>Patient: </span>{{$session->respondent}}</p>


                                    <div class="flex items-center justify-between">
                                        <span class="text-neutral-400 text-sm">Added {{now()->diff($session->created_at)->format('%d d')}} ago.</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-center">
                                    <span class="text-green-500 px-3 text-sm py-1.5 bg-green-50 rounded-lg font-semibold">{{count($session->forms)}} forms</span>
                                </div>
                            </div>


                            <!-- body -->
                            <div class="mt-5 border-t border-dashed space-y-4 py-4">
                                <!-- item 1 -->
                                <div class="flex-col justify-between">
                                    @foreach($session->forms as $form)
                                        <div class="pb-4">
                                            <p class="text-lg text-neutral-600">{{$form->title}}</p>
                                            <div class="flex-row">
{{--                                                @foreach ($form->questions as $question)--}}
{{--                                                    <p class="inline-block mt-1 text-neutral-400 px-3 text-sm bg-green-50 rounded-lg font-semibold py-1.5">{{$question->title}}</p>--}}

{{--                                                @endforeach--}}
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

