<x-app-layout>
    <x-slot name="header">
       
    </x-slot>

    <div class="py-12">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-12">
            <div class="flex items-center bg-gray-200 h-24">
                <div class="flex-1 text-gray-700 text-center bg-gray-400 px-4 py-2 m-2" > 
                   Wecome {!! Auth::user()->name!!}
                </div>
                <div class="flex-1 text-gray-700 text-center bg-gray-400 px-4 py-2 m-2" > 
                    <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" href="{{route('allProducts')}}">Our Products</a>
                </div>  
            </div>
        </div>
    </div>
</x-app-layout>


