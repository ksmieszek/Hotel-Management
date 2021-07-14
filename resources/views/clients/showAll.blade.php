<x-app-layout>
    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 pb-12 bg-white border-b border-gray-200 text-gray-500 flex justify-center">
                    <form method='POST' class="flex flex-col items-center">
                        @csrf
                        <input class="mb-10 py-2 px-4 rounded-lg bg-green-500 text-white cursor-pointer" type='submit' onClick="action='/clients/edit/-1'" value='Dodaj klienta'>
                        
                        <table>
                            <tr>
                                @php $naglowki = ["Imię", "Nazwisko","Telefon","Pesel","Płeć","Akcja"]; @endphp
                                @foreach ($naglowki as $naglowek)
                                    <td class="px-8 py-2 font-bold">{{$naglowek}}</td>
                                @endforeach
                            </tr>

                            @foreach($clients as $client)
                                <tr class="border-t-2 h-12">
                                    @foreach($client->getAttributes() as $p=>$pole)
                                        @if($p != 'id') <td class="px-8 py-2">{{$pole}}</td> @endif
                                    @endforeach
                                    <td>
                                        <input class="py-1 px-2 rounded-lg bg-blue-500 text-white cursor-pointer ml-8" type='submit' onClick="action='/clients/edit/{{$client->id}}'" value='Edytuj'>
                                        <input class="py-1 px-2 rounded-lg bg-red-500 text-white cursor-pointer" type='submit' onClick="action='/clients/destroy/{{$client->id}}'"  value='Usuń'>
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