@include('/recursos/navbar')

<header class="m-4">
    <div class="flex justify-center">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-1/2"> <!-- Cambiado aquí -->
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 text-center">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Ubicación
                        </th>
                        <th scope="col" class="px-6 py-3">
                            País
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Moneda
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Zona Horaria
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$userData['city'] ?? 'Ciudad desconocida' }}, {{$userData['region'] ?? 'Región desconocida' }}
                        </td>
                        <td class="px-6 py-4">
                            {{$userData['country_name'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{$userData['currency']['name'] }} ({{$userData['currency']['symbol'] }})
                        </td>
                        <td class="px-6 py-4">
                            {{$userData['time_zone']['name'] }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</header>
<div  class="grid grid-cols-2 m-4 md:grid-cols-3 gap-4 max-w-7xl mx-auto justify-items-center">
    @foreach ($productos as $item)
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <img class="p-8 rounded-t-lg mx-auto" src="{{ asset('storage/uploads/' . $item->image) }}" alt="{{ $item->name }}" />
            <div class="px-5 pb-5">
                <h2 style="color: #e50881;" class="mb-2 text-xl font-semibold">
                        {{$item->name}}
                </h2>
                <p class="mb-2">
                    {{$item->description}}
                </p>
                <h6 class="italic">Stock: {{$item->quantity}}</h6>
                <div class="flex items-center justify-between">
                    <span style="color: #e50881;" class="text-3xl font-bold text-gray-900 dark:text-white">
                        ${{$item->price}}
                    </span>
                    <form action="/carrito/agregar" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <input type="hidden" name="name" value="{{$item->name}}">
                        <input type="hidden" name="price" value="{{$item->price}}">
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="image" value="{{$item->image}}" alt="{{$item->name}}">
                        <input type="hidden" name="description" value="{{$item->description}}">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                            <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                            </svg>
                            Agregar al Carrito
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
{{$productos->links()}}