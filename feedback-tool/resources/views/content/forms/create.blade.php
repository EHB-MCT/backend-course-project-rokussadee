<x-app-layout>
    @include('partials.header', ['title' => 'Create a new form'])

    <form class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" action="{{route('content.postform')}}" method="POST">
        @csrf
        @method('POST')
        <div class="py-12 flex flex-wrap justify-between">
                <div class="bg-gray-100 pb-6  w-full">

                    <!-- card a -->

                    <div class="bg-white p-8 rounded-lg shadow-lg shadow-neutral-200">
                        <!-- header -->
                        <div class="flex justify-between mb-4">
                            <div>
                                <p class="text-lg font-semibold text-neutral-700" >Give your form a title.</p>
                                <input class="text-lg text-neutral-600 overflow-visible w-full bg-white outline-orange-400 outline-offset-2" name="title" placeholder="Title">
                            </div>
                        </div>
                        <!-- body -->
                        <div class="mt-5 border-t border-dashed space-y-4 py-4">
                            <!-- item 1 -->
                            <div class="flex-col justify-between">
                                <div class="pb-4">
                                    <p class="text-lg font-semibold text-neutral-700" >Give a description to your form.</p>
                                    <input class="text-lg text-neutral-600 overflow-visible w-full bg-white outline-orange-400 outline-offset-2" name="description" placeholder="Description">
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 border-t border-dashed space-y-4 py-4">
                            <button type="submit" class="text-blue-500 text-sm py-2 px-4 bg-blue-50 hover:bg-blue-100 hover:text-blue-800 rounded font-semibold">
                                Submit
                            </button>
                        </div>
                        <input name="user_id" hidden value={{$id}}>
                </div>
        </div>
    </div>
    </form>
</x-app-layout>
