<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Sorteos
        </h2>
    </x-slot>

    <div class="py-12">


        <a href="/sorteos/create">New Sorteo</a>

        <form method="GET" action="/sorteos">
          <label>Name:</label>
          <input class="form-input px-4 py-3 rounded-full" type="text" name="name" autofocus value="{{request()->get('nombre')}}" >
          <br>
          <label>Date:</label>
          <input type="date" name="fecha" value="{{request()->get('fecha')}}">
          <br>
          <label>Hour:</label>
          <input type="text" name="hour" value="{{request()->get('hora')}}">
          <br>
          <input type="submit" value="Filter">
        </form>


        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th>id</th>
              <th>nombre</th>
              <th>fecha</th>
              <th>hora</th>
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
