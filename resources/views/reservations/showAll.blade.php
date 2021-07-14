<x-app-layout>
    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 pb-12 bg-white border-b border-gray-200 text-gray-500 flex justify-center">
                    <form method='POST' class="flex flex-col items-center">
                        @csrf
                        <input class="mb-10 py-2 px-4 rounded-lg bg-green-500 text-white cursor-pointer" type='submit' onClick="action='/reservations/edit/-1'" value='Dodaj rezerwację'>
                        
                        <table>
                            <tr>
                                @php $naglowki = ["Imię","Nazwisko","Telefon","Data rozpoczęcia","Data zakończenia","Numer pokoju","Piętro","Razem","Akcja"]; @endphp
                                @foreach ($naglowki as $naglowek)
                                    <td class="px-8 py-2 font-bold">{{$naglowek}}</td>
                                @endforeach
                            </tr>
                        
                            @foreach($reservations as $reservation)
                                <tr class="border-t-2 h-12">

                                    @foreach($reservation->getAttributes() as $p=>$pole)
                                        <!-- przygotowywanie danych do wyswietlenia listy rezerwacji -->
                                        @switch($p)
                                            @case('id') @break;
                                            @case('id_klienta')@php  $dane_klienta="<td class='px-8 py-2'>{$reservation->klient->imie}</td><td class='px-8 py-2'>{$reservation->klient->nazwisko}</td><td class='px-8 py-2'>{$reservation->klient->telefon}</td>" @endphp @break;
                                            @case('data_rozpoczecia') @php $data_rozpoczecia="<td class='px-8 py-2'>{$reservation->data_rozpoczecia}</td>" @endphp @break;
                                            @case('data_zakonczenia') @php $data_zakonczenia="<td class='px-8 py-2'>{$reservation->data_zakonczenia}</td>" @endphp @break;
                                            @case('id_pokoju') @php $dane_pokoju="<td class='px-8 py-2'>{$reservation->pokoj->numer_pokoju}</td><td class='px-8 py-2'>{$reservation->pokoj->pietro}</td>" @endphp @break;
                                            @case('razem') @php $razem="<td class='px-8 py-2'>{$reservation->razem}</td>" @endphp @break;

                                        @endswitch
                                    @endforeach
                                    
                                    <!-- wyswietlenie listy rezerwacji -->
                                    @php 
                                        echo $dane_klienta; 
                                        echo $data_rozpoczecia; 
                                        echo $data_zakonczenia; 
                                        echo $dane_pokoju; 
                                        echo $razem; 
                                    @endphp

                                    <td>
                                        <input class="py-1 px-2 rounded-lg bg-blue-500 text-white cursor-pointer ml-8" type='submit' onClick="action='/reservations/edit/{{$reservation->id}}'" value='Edytuj'>
                                        <input class="py-1 px-2 rounded-lg bg-red-500 text-white cursor-pointer" type='submit' onClick="action='/reservations/destroy/{{$reservation->id}}'"  value='Usuń'>
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
