<x-app-layout>
    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 pb-12 bg-white border-b border-gray-200 text-gray-500 flex flex-col items-center">
                @php 
                    if(isset($_GET['fraza']))
                        $fraza = $_GET['fraza'];
                    else
                        $fraza = ""
                @endphp

                    <form method="get" class="flex items-center mt-2 mb-10">
                        <x-input  class="block mt-1 w-full h-9 mx-5" type="text" name='fraza' value="{{ $fraza }}" />
                        <button value="Filtruj" class="outline-none" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </form>

                    <form method='POST' class="flex flex-col items-center">
                        @csrf
                        <input class="mb-10 py-2 px-4 rounded-lg bg-green-500 text-white cursor-pointer" type='submit' onClick="action='/rooms/edit/-1'" value='Dodaj pokój'>
                        <table>
                            <tr>
                                @php $naglowki = ["Numer pokoju","Piętro","Wyposażenie","Status","Stan","Cena","Akcja"]; @endphp
                                @foreach ($naglowki as $naglowek)
                                    <td class="px-8 py-2 font-bold">{{$naglowek}}</td>
                                @endforeach
                            </tr>

                            @php $isFound = false; @endphp
                        
                            @foreach($rooms as $room)

                                @foreach($room->getAttributes() as $p=>$pole)
                                        @if(isset($_GET['fraza']) && $_GET['fraza'] != "" && substr_count($pole, $_GET['fraza']) == 0)
                                            @continue
                                        @else
                                            @php $isFound = true; @endphp
                                        @endif
                                @endforeach

                                @if($isFound === false)
                                    @continue
                                @endif

                                @php $isFound = false; @endphp

                                <tr class="border-t-2 h-12">
                                    @foreach($room->getAttributes() as $p=>$pole)
                                        @if($p != 'id') <td class="px-8 py-2">{{$pole}}</td> @endif
                                    @endforeach
                                    <td>
                                        <input class="py-1 px-2 rounded-lg bg-blue-500 text-white cursor-pointer ml-8" type='submit' onClick="action='/rooms/edit/{{$room->id}}'" value='Edytuj'>
                                        <input class="py-1 px-2 rounded-lg bg-red-500 text-white cursor-pointer" type='submit' onClick="action='/rooms/destroy/{{$room->id}}'"  value='Usuń'>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>