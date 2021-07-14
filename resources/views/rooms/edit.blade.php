<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-gray-900 flex flex-col items-center">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <div class="mb-10 text-2xl">
                        @if($pokoj->id != -1)
                            <b>Edytuj pokój</b>
                        @else
                            <b>Dodaj pokój</b>
                        @endif
                    </div>
                    <form method=POST action="{{route('updatePokoj',$pokoj->id)}}" class="flex flex-col items-center"> 
                        @csrf
                        <table>
                           <tr>
                                <td>Numer pokoju</td><td colspan=2>
                                <input class="mx-10 my-1 rounded-lg border-gray-400" type=text name='numer_pokoju' value='{{$pokoj->numer_pokoju}}' autofocus></td>
                            </tr>
                            <tr>
                                <td>Piętro</td><td colspan=2>
                                <input class="mx-10 my-1 rounded-lg border-gray-400" type=text name='pietro' value='{{$pokoj->pietro}}'></td>
                            </tr>
                            <tr>
                                <td>Wyposażenie</td><td colspan=2>
                                <textarea class="mx-10 my-1 rounded-lg border-gray-400" type=text name='wyposazenie' >{{$pokoj->wyposazenie}}</textarea></td>
                            </tr>
                            <tr>
                                <td>Status</td><td colspan=2>
                                <select name="status" class="mx-10 my-1 rounded-lg border-gray-400">
                                        @if($pokoj->id != -1)
                                            @if($pokoj->status === 'wolny') <option selected>wolny</option>
                                            @else <option>wolny</option>
                                            @endif
                                            @if($pokoj->status === 'zajęty') <option selected>zajęty</option>
                                            @else <option>zajęty</option>
                                            @endif
                                        @else
                                            <option></option>
                                            <option>wolny</option>
                                            <option>zajęty</option>
                                        @endif
                                </select>
                            </tr>
                            <tr>
                                <td>Stan</td><td colspan=2>
                                <select name="stan" class="mx-10 my-1 rounded-lg border-gray-400">
                                        @if($pokoj->id != -1)
                                            @if($pokoj->stan === 'czysty') <option selected>czysty</option>
                                            @else <option>czysty</option>
                                            @endif
                                            @if($pokoj->stan === 'brudny') <option selected>brudny</option>
                                            @else <option>brudny</option>
                                            @endif
                                        @else
                                            <option></option>
                                            <option>czysty</option>
                                            <option>brudny</option>
                                        @endif
                                </select>
                            </tr>
                            <tr>
                                <td>Cena</td><td colspan=2>
                                <input class="mx-10 my-1 rounded-lg border-gray-400" type=text name='cena' value='{{$pokoj->cena}}'></td>
                            </tr>
                        </table>
                        <input class="mt-12 py-2 px-4 rounded-lg max-w-min py-2 px-4 rounded-lg bg-green-500 text-white cursor-pointer" type=submit  value='Zapisz'>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>