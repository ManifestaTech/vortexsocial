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
            <p class="text-center mt-6 font-thin text-xs">YOU SEARCHED FOR:</p>
            <h1 class="m-4 mt-0 text-center font-bold text-xl">{{ $contains ? $contains : '' }}</h1>

    

        
        @if($availableNumbers->isEmpty())
            <h3>Search for a number</h3>
        @else
        <form action="{{ route('number.provision') }}" method="POST">
            @csrf

            <ul class="mt-10">
                @if($vanitizedNumbers)
                    @foreach($vanitizedNumbers as $vanitized)
                        <li class="m-2">
                            <label>
                                <input type="radio" name="number" value="" class="mr-2 font-semibold text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black"/>
                                {{ $vanitized }}
                            </label>
                        </li>
                    @endforeach
                @endif
            </ul>
            <button type="submit" class="rounded-full text-white 
        bg-purple-400 hover:bg-purple-500 duration-300 
        text-md font-bold 
        mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1 
        opacity-90 hover:opacity-100 text-center">Select this Number</button>

        </form>
           
        @endif
    </div>
       
        
    </div>
</x-app-layout>
