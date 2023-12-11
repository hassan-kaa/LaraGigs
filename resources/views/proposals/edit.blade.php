<x-layout>
    <div class="p-10 max-w-lg mx-auto mt-24">
      <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Want to change something ?</h2>
      </header>
  
      <form method="POST" action="/proposal/{{$proposal->listing->id}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
          <label for="cover_letter" class="inline-block text-lg mb-2">Cover Letter</label>
          <textarea type="textarea" class="border border-gray-200 rounded p-2 w-full"
          rows="10"
            placeholder="Include skills, previous experiences, salary expectations, etc" name="cover_letter"
            value="{{$proposal->cover_letter}}" >
            </textarea>
  
          @error('cover_letter')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
  
        <div class="mb-6">
          <label for="CV" class="inline-block text-lg mb-2">
            Update CV (optional)
          </label>
          <input type="file" class="border border-gray-200 rounded p-2 w-full" name="CV" />
  
          @error('CV')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
  
        
  
        <div class="mb-6">
          <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
            update Proposal
          </button>
  
          <a href="/" class="text-black ml-4"> Back </a>
        </div>
      </form>
    </div>
  </x-layout>