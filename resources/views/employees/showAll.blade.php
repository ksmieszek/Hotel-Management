<x-app-layout>
    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 pb-12 bg-white border-b border-gray-200 text-gray-500 flex justify-center">
                    <form method='GET' class="flex flex-col items-center">
                        @csrf
                        <input class="mb-10 py-2 px-4 rounded-lg bg-green-500 text-white cursor-pointer" type='submit' onClick="action='/pracowniks/create'" value='Dodaj pracownika'>
                        <table>
                            <tr>
                                @php $naglowki = ["Imię", "Nazwisko", "Stanowisko", "Płaca","Akcja"]; @endphp
                                @foreach($naglowki as $naglowek)
                                    <td class="px-8 py-2 font-bold">{{$naglowek}}</td>
                                @endforeach
                            </tr>
                            
                            @foreach($pracownicy as $pracownik)
                                <tr  class="border-t-2 h-12">

                                @foreach($pracownik->getAttributes() as $p=>$pole)
                                    @if($p != 'id') <td class="px-8 py-2">{{$pole}}</td> @endif				
                                @endforeach

                                <td align='center'>
                                        <input type='submit' 
                                            onClick="action='/pracowniks/{{$pracownik->id}}/edit'" 
                                            value='Edytuj' class="py-1 px-2 rounded-lg bg-blue-500 text-white cursor-pointer ml-8">
                                </form>	
                                <form method='POST' action='/pracowniks/{{$pracownik->id}}' style='display:inline'>
                                    @csrf
                                    <input type='hidden' name='_method' value='DELETE'>
                                    <input class="py-1 px-2 rounded-lg bg-red-500 text-white cursor-pointer" type='submit' value='Usuń'>
                                </form>
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