<x-app-layout>
    <x-slot name="header" class="flex flex-row justify-between">
        <div class="flex justify-between">
            <div class="flex">
                <h2 class="flex font-semibold text-xl text-gray-800 leading-tight hidden sm:flex sm:items-center">
                    Session: {{$session->title}}
                </h2>

            </div>

        </div>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="py-12 flex flex-wrap justify-between">
            @if($session)
                <div class="bg-gray-100 pb-6 w-full">
                <!-- card a -->

                    <div class="bg-white p-8 rounded-lg shadow-lg shadow-neutral-200">
                        <!-- header -->
                        <div>
                            <p class="text-xl font-semibold text-neutral-700">{{$session->title}}</p>
                        </div>
                        <div class="flex justify-between" >
                            <div>
                                @can('user_management_access')
                                    <p class="mt-1.5 text-neutral-400 text-sm"><span class=font-bold>By: </span>{{$session->user->name}}</p>
                                @endcan
                                <p class=" text-neutral-400 text-sm"><span class=font-bold>Respondent: </span>{{$session->respondent}}</p>

                                <div class="flex items-center justify-between">
                                    <span class="text-neutral-400 text-sm">Added {{now()->diff($session->created_at)->format('%d d')}} ago.</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-center">
                                <span class="text-green-500 px-3 text-sm py-1.5 bg-green-50 rounded-lg font-semibold">{{count($session->forms)}} forms</span>
                            </div>
                        </div>
                        <!-- bedge -->
                        <div class="mt-4">
                            <p class="text-neutral-400 text-lg">
                                Description
                            </p>
                        </div>


                        <!-- body -->
                        <div class="mt-5 border-t border-dashed space-y-4 py-4">
                            <!-- item 1 -->
                            <div class="flex-col justify-between">
                                @foreach($session->forms as $form)
                                    @if(\App\Models\FormResult::class::where([['respondent', '=', $session->respondent], ['feedback_form_id', '=', $form->id]])->exists() && \App\Models\FormResult::class::where([['respondent', '=', $session->respondent], ['feedback_form_id', '=', $form->id]])->get()->first()->feedback_form_id == $form->id)
                                        <div class="bg-green-50 p-8 rounded-lg border-2 border-green-300 shadow-inner shadow-green-100 mb-4">
                                            <div class="flex justify-between pb-4">
                                                <div class="pb-1 flex">
                                                    <p class="text-lg text-neutral-600">{{$form->title}}</p>
                                                </div>
                                            </div>

                                            <div class="flex">
                                                <p>This form has been submitted!</p>
                                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="block m-auto ml-2 align-middle w-4 h-4 mr-2 fill-green-500" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <path fill="green-500" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    @else
                                            <div class="bg-white p-8 rounded-lg border border-neutral-100 mb-4">
                                            <div class="flex justify-between pb-4">
                                                <div class="pb-1">
                                                    <p class="text-lg text-neutral-600">{{$form->title}}</p>
                                                </div>
                                                <div class="float-right">
                                                    <div class="flex-row">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="inline-flex bg-blue-50 p-2 border-2 rounded-md border-blue-500 ">
                                                <p class="text-blue-500">Start this form</p>
                                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-circle-right" class="block m-auto ml-2 w-4 h-4 mr-2 fill-blue-500" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <path fill="blue-500" d="M256 8c137 0 248 111 248 248S393 504 256 504 8 393 8 256 119 8 256 8zm113.9 231L234.4 103.5c-9.4-9.4-24.6-9.4-33.9 0l-17 17c-9.4 9.4-9.4 24.6 0 33.9L285.1 256 183.5 357.6c-9.4 9.4-9.4 24.6 0 33.9l17 17c9.4 9.4 24.6 9.4 33.9 0L369.9 273c9.4-9.4 9.4-24.6 0-34z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
