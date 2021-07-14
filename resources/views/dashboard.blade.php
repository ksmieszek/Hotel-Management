<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex text-center justify-around mt-44 text-gray-500 text-2xl">
            <div class="bg-gray-100 sm:rounded-lg w-1/4 h-64 flex flex-col justify-center"><p class="text-7xl mb-6 text-green-600">{{$przyjazdy}}</p><p>Przyjazdów</p></div>
            <div class="bg-gray-100 sm:rounded-lg w-1/4 h-64 flex flex-col justify-center"><p class="text-7xl mb-6 text-blue-600">{{$aktywne}}</p><p>Aktywnych</p></div>
            <div class="bg-gray-100 sm:rounded-lg w-1/4 h-64 flex flex-col justify-center"><p class="text-7xl mb-6 text-red-600">{{$wyjazdy}}</p><p>Wyjazdów</p></div>
        </div>
    </div>
</x-app-layout>
