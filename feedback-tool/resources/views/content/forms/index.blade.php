
<x-app-layout>
    @include('partials.header', ['title' => 'All Forms'])

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="py-12 flex flex-wrap justify-between">
        @if($forms)
            @foreach($forms as $form)
                <div class="bg-gray-100 pb-6">

                    <div class="bg-white p-8 rounded-lg shadow-lg shadow-neutral-200 w-96 max-h-96 overflow-hidden">
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

