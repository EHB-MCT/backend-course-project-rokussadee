<x-app-layout>
    @include('partials.header', ['title' => 'Edit form: ' . $form->title])

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="py-12 flex flex-wrap justify-between">
            @if($form)
                <div class="bg-gray-100 pb-6  w-full">

                    <!-- card a -->

                    <div class="bg-white p-8 rounded-lg shadow-lg shadow-neutral-200">
                        <!-- header -->
                        <div>
                            <p class="text-xl font-semibold text-neutral-700">{{$form->title}}</p>
                        </div>
                        <div class="flex justify-between" >
                            <div>
{{--                                @can('user_management_access')--}}
                                    <p class="mt-1.5 text-neutral-400 text-sm">{{$form->user->name}}</p>
{{--                                @endcan--}}

                                <div class="flex items-center justify-between">
                                    <span class="text-neutral-400 text-sm">Added {{now()->diff($form->created_at)->format('%d d')}} ago.</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-center">
                                <span class="text-green-500 px-3 text-sm py-1.5 bg-green-50 rounded-lg font-semibold">{{count($form->questions)}} questions</span>
                            </div>
                        </div>
                        <!-- bedge -->
                        <form class="mt-4" action="{{route('content.updatedescription', ['slug' => $form->slug])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input class="text-neutral-400 text-lg bg-white" value="{{$form->description}}" name="description" id="input{{$form->slug}}" readonly disabled>

                            @can('form_edit')
                                <button class="text-blue-500 text-sm py-2 px-4 bg-blue-50 hover:bg-blue-100 hover:text-blue-800 rounded font-semibold editButton" data-id="{{$form->slug}}">Edit</button>
                                <button class="text-green-500 text-sm py-2 px-4 bg-green-50 hover:bg-green-100 hover:text-green-800 rounded font-semibold" id="saveButton{{$form->slug}}" type="submit" hidden> Save </button>
                            @endcan
                        </form>

                        <!-- body -->
                        <div class="mt-5 border-t border-dashed space-y-4 py-4">
                            <!-- item 1 -->
                            <div class="flex-col justify-between">
                                @foreach($questions as $question)
                                    <form class="flex justify-between" action="{{route('question.updatetitle', ['id' => $question->id])}}" method="POST">
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
