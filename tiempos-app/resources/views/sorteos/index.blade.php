<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Sorteos
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="GET" action="/sorteos">
          <label>Nombre:</label>
          <input type="text" name="name" autofocus value="{{request()->get('nombre')}}" >
          <br>
          <br>
          <label>Fecha:</label>
          &nbsp;
          <input style="width:230px;position:absolute; left: 10%; top: 36%;" type="date" name="fecha" value="{{request()->get('fecha')}}">
          <br>
          <br>
          <label>Hora:</label>
          &nbsp;
          <input style=" width:230px; position:absolute; left: 10%; top: 44%; " type="text" name="hour" value="{{request()->get('hora')}}">
          <br>
          <br>
          <br>
          <button style=" width:79px; position:absolute; left: 21%;"  class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
           Crear
          </button>
          <br><br><br>
        </form>


        <table class="min-w-full divide-y divide-gray-200 col text-center">
          <thead class="bg-gray-50">
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Fecha</th>
              <th>Hora</th>
              <th></th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          @forelse ($sorteos as $sorteo)
            <tr>
              <td>{{ $sorteo->id }}</td>
              <td>
                <a href="/sorteos/{{$sorteo->id}}">{{ $sorteo->nombre }}</a>
              </td>
              <td>{{ $sorteo->fecha }}</td>
              <td>{{ $sorteo->hora }}</td>
              <td>
                <a href="/sorteos/{{$sorteo->id}}/edit">Edit</a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4">No hay sorteos 😥</td>
            </tr>
          @endforelse
          </tbody>
        </table>
        {{ $sorteos ?? '' ?? ''->links() }}
    </div>
</x-app-layout>
