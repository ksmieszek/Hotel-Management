<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-gray-900 flex flex-col items-center">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <div class="mb-10 text-2xl">
                        @if($rezerwacja->id != -1)
                            <b>Edytuj rezerwację</b>
                        @else
                            <b>Dodaj rezerwację</b>
                        @endif
                    </div>
                    <form method=POST action="{{route('updateRezerwacja',$rezerwacja->id)}}" class="flex flex-col items-center"> 
                        @csrf
                        <table>
                           <tr>
                                <td>Klient</td><td colspan=2>
                                <select name="id_klienta" class="mx-10 my-1 rounded-lg border-gray-400">
                                    <option></option>
                                    @foreach($klienci as $klient)
                                        @if($rezerwacja->id != -1 && $rezerwacja->klient->id == $klient->id)
                                            <option value='{{$klient->id}}' selected>{{$rezerwacja->klient->imie}} {{$rezerwacja->klient->nazwisko}}</option>
                                        @else
                                            <option value='{{$klient->id}}'>{{$klient->imie}} {{$klient->nazwisko}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </tr>
                            <tr>
                                <td>Pokój</td><td colspan=2>
                                <select name="id_pokoju" class="mx-10 my-1 rounded-lg border-gray-400">
                                    <option></option>
                                    @foreach($pokoje as $pokoj)
                                        @if($rezerwacja->id != -1 && $rezerwacja->pokoj->id == $pokoj->id)
                                            <option value='{{$pokoj->id}}' selected>{{$rezerwacja->pokoj->numer_pokoju}}</option>
                                        @else
                                            <option value='{{$pokoj->id}}'>{{$pokoj->numer_pokoju}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </tr>
                            <tr>
                                <td>Data rozpoczęcia</td><td colspan=2>
                                <input class="mx-10 my-1 rounded-lg border-gray-400" type=date name='data_rozpoczecia' value='{{$rezerwacja->data_rozpoczecia}}'></td>
                            </tr>
                            <tr>
                                <td>Data zakończenia</td><td colspan=2>
                                <input class="mx-10 my-1 rounded-lg border-gray-400" type=date name='data_zakonczenia' value='{{$rezerwacja->data_zakonczenia}}'></td>
                            </tr>
                        </table>
                        <input class="mt-12 py-2 px-4 rounded-lg max-w-min py-2 px-4 rounded-lg bg-green-500 text-white cursor-pointer" type=submit  value='Zapisz'>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>