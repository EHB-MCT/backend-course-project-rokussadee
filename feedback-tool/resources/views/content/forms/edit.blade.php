<x-app-layout>
    <x-slot name="header" class="flex flex-row justify-between">
        <div class="flex justify-between">
            <div class="flex">
                <h2 class="flex font-semibold text-xl text-gray-800 leading-tight hidden sm:flex sm:items-center">
                    Form: {{$form->title}}
                </h2>
                @if(\Illuminate\Support\Facades\Session::has('message'))
                    <div class="bg-green-50 border border-green-400 text-green-800 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold text-green-500">Successful!</strong>
                        <span class="block sm:inline">{{\Illuminate\Support\Facades\Session::get('message')}}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                        </span>
                    </div>

                @endif
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
                                @foreach($questions as $question)
                                    <form class="flex justify-between" action="{{route('question.update', ['id' => $question->id])}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="pb-4">
                                            <input class="text-lg text-neutral-600 overflow-visible w-full bg-white outline-orange-400 outline-offset-2" id="input{{$question->id}}" name="title" value="{{$question->title}}" readonly disabled>
                                            <div class="flex-row">
                                                @foreach ($question->categories as $cat)
                                                    <p class="inline-block mt-1 text-neutral-400 px-3 text-sm bg-green-50 rounded-lg font-semibold py-1.5">{{$cat->title}}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="float-right flex-nowrap">
                                            @can('form_edit')
                                                <button class="text-blue-500 text-sm py-2 px-4 bg-blue-50 hover:bg-blue-100 hover:text-blue-800 rounded font-semibold editButton" data-id="{{$question->id}}">
                                                    Edit
                                                </button>
                                                <button class="text-green-500 text-sm py-2 px-4 bg-green-50 hover:bg-green-100 hover:text-green-800 rounded font-semibold" id="saveButton{{$question->id}}" type="submit" hidden> Save </button>
                                            @endcan
                                            @can('form_delete')
                                                <button class="text-red-500 text-sm py-2 px-4 bg-red-50 hover:bg-red-100 hover:text-red-800 rounded font-semibold" id="deleteButton{{$question->id}}" data-id="{{$question->id}}">
                                                    Delete
                                                </button>
                                            @endcan
                                        </div>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                        <div class="text-center py-0.5 bg-neutral-100 text-neutral-400 font-semibold rounded-lg mt-3">+1 more</div>
                    </div>


                </div>
            @endif

        </div>
    </div>
    @include('partials.createquestion')
    <script src="{!! asset('js/editform.js') !!}" type="module"></script>
{{--    <script src="{{asset('js/auto.js')}}"></script>--}}
</x-app-layout>
