<x-app-layout>

    <div class="py-12">


    <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
        <div>
            <form action="" method="GET">
                <input type="text" name="contains" class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                <button id="button" type="button" class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-pink-500 hover:bg-pink-600 hover:shadow-lg focus:outline-none">
                    FIND YOUR NUMBER
                </button>
            </form>
        </div>
        
            <h3>{{ $contains ? $contains : '' }}</h3>
    

        
        @if($availableNumbers->isEmpty())
            <h3>Search for a number</h3>
        @else
        <form action="{{ route('number.provision') }}" method="POST">
            @csrf

            <ul class="mt-10">
                @if($vanitizedNumbers)
                    @foreach($vanitizedNumbers as $vanitized)
                        <li>
                            <label>
                                <input type="radio" name="number" value="" class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black"/>
                                {{ $vanitized }}
                            </label>
                        </li>
                    @endforeach
                @endif
            </ul>
            <button type="submit" class="focus:outline-none text-white text-xs py-2 px-4 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg">Select this Number</button>

        </form>
           
        @endif
    </div>
       
        
    </div>
</x-app-layout>
