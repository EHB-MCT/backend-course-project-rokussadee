<x-app-layout>
    @include('partials.header', ['title' => 'All Users'])

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="py-12 flex flex-wrap justify-between">
            @if($users)
                @foreach($users as $user)
                    <div class="bg-gray-100 pb-6">
                        <div class="bg-white p-8 rounded-lg shadow-lg shadow-neutral-200 w-96">
                            <div class="flex-row flex items-center justify-between">
                                <div class="flex-row gap-4 flex items-center">
                                    <div class="flex-shrink-0 ">
                                        <div class="flex items-center justify-center">
                                            <div
                                                class="bg-green-50 mx-auto object-cover rounded-full h-16 w-16 text-center text-green-500">
                                                @foreach(explode(' ', $user->name) as $name)
                                                {{strtoupper($name)[0]}}
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" flex flex-col">
                                        <a href="{{route('admin.user', ['id' => $user->id])}}" class="text-gray-600 text-lg font-medium">
                                            {{$user->name}}
                                        </a>

                                        <span class="text-gray-400 text-xs">
                                            @can('user_management_access')
                                            {{$user->getRoleNames()[0]}}
                                            @endcan
                                        </span>
                                    </div>
                                </div>
                                <a href="" class="text-blue-500 text-sm py-2 px-4 bg-blue-50 hover:bg-blue-100 hover:text-blue-800 rounded font-semibold">
                                    Edit
                                </a>

                            </div>
                            <!-- header -->
                            <!-- bedge -->
{{--                            <span class="text-green-500 px-3 text-sm py-1.5 bg-green-50 rounded-lg font-semibold">{{count($form->questions)}} questions</span>--}}


                            <div class="flex items-center justify-between mt-5">
                                <div class="flex items-center">
                                    <span class="text-green-500 px-3 text-sm py-1.5 bg-green-50 rounded-lg font-semibold">{{count($user->forms)}} forms</span>
                                </div>

                            </div>

                            <!-- body -->
                            <div class="mt-5 border-t border-dashed space-y-4 py-4">
                                <!-- item 1 -->
                                <div class="flex-col justify-between">
                                    @foreach($user->forms as $form)
                                        <div class="pb-4">
                                            <p class="text-lg text-neutral-600">
                                                {{$form->title}}
                                            </p>
                                            <p class="mt-1 text-sm text-neutral-400 font-semibold px-3 py-1.5 bg-gradient-to-r from-green-50 to-white-500 italic" >
                                                {{$form->description}}
                                            </p>
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
