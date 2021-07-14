<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-gray-900 flex flex-col items-center">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <div class="mb-10 text-2xl">
                        @if($pracownik->id != -1)
                            <b>Edytuj pracownika</b>
                        @else
                            <b>Dodaj pracownika</b>
                        @endif
                    </div>
                    @if($pracownik->id != -1)
                    <form class="flex flex-col items-center" method=POST action="{{route('pracowniks.update', $pracownik)}}">
                        <input type='hidden' name='_method' value='PUT'>
                    @else
                    <form class="flex flex-col items-center" method=POST action="{{route('pracowniks.store')}}">
                    @endif
                        @csrf
                        <table>
                            <tr>
                                <td>Imię</td><td colspan=2>
                                <input class="mx-10 my-1 rounded-lg border-gray-400" type=text name='imie' value='{{$pracownik->imie}}' autofocus></td>
                            </tr>
                            <tr>
                                <td>Nazwisko</td><td colspan=2>
                                <input class="mx-10 my-1 rounded-lg border-gray-400" type=text name='nazwisko' value='{{$pracownik->nazwisko}}'></td>
                            </tr>
                            <tr>
                                <td>Stanowisko</td><td colspan=2>
                                <input class="mx-10 my-1 rounded-lg border-gray-400" type=text name='stanowisko' value='{{$pracownik->stanowisko}}'></td>
                            </tr>
                            <tr>
                                <td>Płaca</td><td colspan=2>
                                <input class="mx-10 my-1 rounded-lg border-gray-400" type=text name='placa' value='{{$pracownik->placa}}'></td>
                            </tr>
                        </table>
                        <input class="mt-12 py-2 px-4 rounded-lg max-w-min py-2 px-4 rounded-lg bg-green-500 text-white cursor-pointer" type=submit  value='Zapisz'>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>