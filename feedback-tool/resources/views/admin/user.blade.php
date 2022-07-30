
<x-app-layout>
    @include('partials.header', ['title' => 'User: ' . $user->name])

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="py-12 flex flex-wrap justify-between">
            <div class="bg-gray-100 pb-6 w-full">
                <div class="relative bg-white p-8 rounded-lg shadow-lg shadow-neutral-200 w-full">
                    <div class="flex-row flex items-center justify-between">
                        <div class="absolute mx-auto left-0 right-0 text-center border-4 border-white -top-10 bg-green-50 object-cover rounded-full h-24 w-24 text-center text-green-500">
                            @foreach(explode(' ', $user->name) as $name)
                                {{strtoupper($name)[0]}}
                            @endforeach
                        </div>
                        <div class="absolute mx-auto top-16 left-0 right-0 text-center flex flex-col">
                            <p class="text-xl font-semibold text-neutral-700">
                                {{$user->name}}
                            </p>

                            <span class="text-gray-400 text-xs">
                                            @can('user_management_access')
                                    {{$user->getRoleNames()[0]}}
                                @endcan
                                        </span>
                        </div>
                    </div>
                    <div>
                        <div class="mt-10 flex flex-col">

                            <div class="flex basis-1/2">
                                <div class="w-1/2 mt-5 border-r border-dashed space-y-4 p-4 pl-0">
                                    <h1 class="text-xl font-semibold text-neutral-700">Basic Information</h1>
                                   <div class=" box-border rounded-lg flex flex-col shadow-sm shadow-inner shadow-neutral-100">
                                       @for($i = 0; $i < 3; $i++)
                                           <div class="border-b last-of-type:border-0 pl-3 py-4 border-dashed flex">
                                               <p class="font-semibold text-neutral-700 w-40">
                                                   @switch($i)
                                                       @case(0)
                                                           Full name:</p>
                                                           <p> {{$user->name}}
                                                       @break
                                                       @case(1)
                                                       E-mail address:</p>
                                                       <p> {{$user->email}}
                                                       @break
                                                       @case(2)
                                                      Role:</p>
                                                       <p> {{$user->getRoleNames()[0]}}
                                                       @break
                                                   @endswitch
                                               </p>
                                           </div>
                                       @endfor
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
