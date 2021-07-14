<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-gray-900 flex flex-col items-center">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <div class="mb-10 text-2xl">
                        @if($klient->id != -1)
                            <b>Edytuj klienta</b>
                        @else
                            <b>Dodaj klienta</b>
                        @endif
                    </div>
                    <form method=POST action="{{route('updateKlient',$klient->id)}}" class="flex flex-col items-center"> 
                        @csrf
                        <table>
                            <tr>
                                <td>Imię</td><td colspan=2>
                                <input class="mx-10 my-1 rounded-lg border-gray-400" type=text name='imie' value='{{$klient->imie}}' autofocus></td>
                            </tr>
                            <tr>
                                <td>Nazwisko</td><td colspan=2>
                                <input class="mx-10 my-1 rounded-lg border-gray-400" type=text name='nazwisko' value='{{$klient->nazwisko}}'></td>
                            </tr>
                            <tr>
                                <td>Telefon</td><td colspan=2>
                                <input class="mx-10 my-1 rounded-lg border-gray-400" type=text name='telefon' value='{{$klient->telefon}}'></td>
                            </tr>
                            <tr>
                                <td>Pesel</td><td colspan=2>
                                <input class="mx-10 my-1 rounded-lg border-gray-400" type=text name='pesel' value='{{$klient->pesel}}'></td>
                            </tr>
                            <tr>
                                <td>Płeć</td><td colspan=2>
                                <select name="plec" class="mx-10 my-1 rounded-lg border-gray-400">
                                        @if($klient->id != -1)
                                            @if($klient->plec === 'kobieta') <option selected>kobieta</option>
                                            @else <option>kobieta</option>
                                            @endif
                                            @if($klient->plec === 'mężczyzna') <option selected>mężczyzna</option>
                                            @else <option>mężczyzna</option>
                                            @endif
                                        @else
                                            <option></option>
                                            <option>kobieta</option>
                                            <option>mężczyzna</option>
                                        @endif
                                </select>
                            </tr>
                        </table>
                        <input class="mt-12 py-2 px-4 rounded-lg max-w-min py-2 px-4 rounded-lg bg-green-500 text-white cursor-pointer" type=submit  value='Zapisz'>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>