<x-slot name="header" class="flex flex-row justify-between">
    <div class="flex justify-between">
        <a href="{{url()->previous()}}" class="group h-6 flex items-center pointer-events-auto">
            <svg class="h-10 w-10 text-gray-800"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
            </svg>
            <p class="ml-3 group-hover:pl-7 group-hover:backdrop-blur-2xl duration-150 outline-none font-semibold text-xl text-gray-800 leading-tight hidden sm:flex sm:items-center">Back</p>
        </a>
        <div class="flex">
            <h2 class="flex font-semibold text-xl text-gray-800 leading-tight hidden sm:flex sm:items-center">
                {{$title}}
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
