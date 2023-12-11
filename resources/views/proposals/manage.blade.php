<x-layout>
    <header>
      <h1 class="text-3xl text-center font-bold my-6 uppercase">
        Manage Gigs
      </h1>
    </header>

    <table class="w-full table-auto rounded-sm">
      <tbody>
        @unless($proposals->isEmpty())
        @foreach($proposals as $proposal)
        <tr class="border-gray-300">
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <a href="/listing/{{$proposal->listing->id}}"> {{$proposal->listing->title}} </a>
          </td>
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <a href="/proposal/{{$proposal->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                class="fa-solid fa-pen-to-square"></i>
              Edit</a>
          </td>
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            
            <p class="text-yellow-500 px-6 py-2 rounded-xl">
              {{$proposal->status}}</p>
          </td>
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <form method="POST" action="/proposal/{{$proposal->id}}">
              @csrf
              @method('DELETE')
              <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
        @else
        <tr class="border-gray-300">
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <p class="text-center">No Proposals Yet !</p>
            <a href="/" class="text-blue-400 font-bold text-center">Explore Roles </a>
          </td>
        </tr>
        @endunless

      </tbody>
    </table>
</x-layout>