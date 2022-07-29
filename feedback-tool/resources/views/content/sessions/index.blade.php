
<x-app-layout>
    @include('partials.header', ['title' => 'All Sessions'])
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="py-12 flex flex-wrap justify-between">
            @if(count($sessions)>0)
                @foreach($sessions as $session)
                    <div class="bg-gray-100 pb-6 w-full">

                        <!-- card a -->
                        <div class="bg-white p-8 rounded-lg shadow-lg shadow-neutral-200 flex justify-between basis-1/3 shrink-0 grow-0 max-h-40">
                            <!-- header -->
                            <div class="w-1/3">
                                <div class="flex justify-between">
                                    <div>
                                        <a href="{{route('sessions.editsession', ['session' => $session] )}}" class="text-lg font-semibold text-neutral-700">{{$session->title}}</a>
                                    </div>

                                </div>
                                <!-- bedge -->
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
                                </div>
                            </div>


                            <!-- body -->
                            <div class="relative w-1/3 pl-5 border-l border-dashed">
                                <!-- item 1 -->
                                <div class="absolute top-0 left-0 bg-gradient-to-t from-white to-transparent z-20"></div>
                                <div class="flex-col justify-between">
                                    @foreach($session->forms as $form)
                                        <div class="relative group pointer-events-auto mb-3">
                                            <div class="absolute -inset-1 bg-gradient-to-r from-white to-blue-500 rounded-lg blur opacity-0 group-hover:opacity-25 transition duration-300 group-hover:duration-200"></div>
                                            <div class="group-hover:border-opacity-0 group-hover:duration-300 duration-300 px-1 py-1 bg-white ring-1 ring-gray-900/5 rounded-lg leading-none flex justify-start items-center space-x-6">
                                                <a href="{{route('content.editform', ['form' => $form->slug])}}" class="ml-1 text-blue-500 transition duration-200 ">{{$form->title}} →</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="flex items-center justify-center w-1/3">
                                <span class="text-green-500 px-3 text-sm py-1.5 bg-green-50 rounded-lg font-semibold">{{count($session->forms)}} forms</span>
                            </div>
                        </div>


                    </div>
                @endforeach
            @elseif(count($sessions)<1)
                @include('partials.empty', ['content' => 'sessions', 'url' => 'sessions.createsession'])
            @endif

        </div>
    </div>
</x-app-layout>

