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
                            <div class="">
                                <div class="relative bg-gradient-to-tl from-blue-700 via-blue-500 to-blue-500 p-8 rounded-lg shadow-lg w-80 h-16">
                                    <button class="absolute top-5 left-4 text-lg font-semibold text-white hover:text-xl duration-500 ">
                                        Create a new question →
                                    </button>
                                    <div class="absolute top-0 left-0 w-80 h-16 border-4 border-blue-500 blur-sm group-hover:blur-lg z-o pointer-events-none hover:duration-500"></div>
                                    <div class="absolute bottom-0 right-0 h-16 w-16 bg-gradient-to-tl from-transparent via-transparent to-blue-900 rounded-2xl blur-sm"></div>
                                    <div class="absolute bottom-0 right-0 h-16 w-16 shadow-inner shadow-blue-600 bg-gradient-to-tr from-blue-600 via-transparent to-blue-600 rounded-tl-3xl rounded-br-md rounded-tr-md"></div>
                                    <button id="open-btn" class="group pointer-events-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute bottom-0 right-0 h-16 w-16 text-blue-600 text-white group-hover:rotate-180 duration-1000"  fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            @endif

        </div>
    </div>

    <div
        class="fixed hidden inset-0 bg-blue-50 bg-opacity-50 backdrop-blur-sm overflow-y-auto h-full w-full"
        id="my-modal"
    ></div>

    @include('partials.createquestion')

<!--modal content-->
{{--    Script for modal/blur overlay when creating a question.
        Based on following code
        https://www.section.io/engineering-education/creating-a-modal-dialog-with-tailwind-css/--}}
    <script>
        // Grabs all the Elements by their IDs which we had given them
        let backdrop = document.getElementById("my-modal");

        let modal = document.getElementById("modalContainer");

        let btn = document.getElementById("open-btn");

        let button = document.getElementById("ok-btn");

        // We want the modal to open when the Open button is clicked
        btn.onclick = function() {
            backdrop.style.display = "block";
            modal.style.top = "12rem";
        }

        // We want the modal to close when the OK button is clicked
        button.onclick = function() {
            backdrop.style.display = "none";
            modal.style.top = "-999px";
        }

        // The modal will close when the user clicks anywhere outside the modal
        window.onclick = function(event) {
            if (event.target == backdrop) {
                backdrop.style.display = "none";
                modal.style.top = "-999px";
            }
        }
    </script>
    <script src="{!! asset('js/editform.js') !!}" type="module"></script>
</x-app-layout>
