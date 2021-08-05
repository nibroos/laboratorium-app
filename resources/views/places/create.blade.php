<x-app-layout>
  @can('user_access')
    <div>
      <div class="max-w-2xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form method="post" action="{{ route('places.store') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="p-6 bg-white sm:p-6">
                <h1 class="text-center text-2xl font-bold text-indigo-400">New Place Information</h1>
                <div class="mt-8 mb-6 f-outline relative border focus-within:border-indigo-400">
                  <input type="text" name="place_name" id="place_name" placeholder=" "
                    class="block p-2 w-full text-lg appearance-none focus:outline-none bg-transparent"
                    value="{{ old('place_name', '') }}" />
                  <label for="place_name"
                    class="absolute ml-3 px-2 top-0 text-lg text-gray-700 bg-white mt-2 -z-1 duration-300 origin-0">Place
                    Name<span class="text-red-600"> *</span></label>
                  @error('place_name')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                  @enderror
                </div>
                <div class="f-outline relative border focus-within:border-indigo-400">
                  <textarea type="text" name="place_desc" id="place_desc" placeholder=" "
                    class="block p-2 w-full text-lg appearance-none focus:outline-none bg-transparent"
                    value="{{ old('place_desc', '') }}" rows="5">
                    </textarea>
                  <label for="place_desc"
                    class="absolute ml-3 px-2 top-0 text-lg text-gray-700 bg-white mt-2 -z-1 duration-300 origin-0">Place
                    Description<span class="text-red-600"> *</span></label>
                  @error('place_desc')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="flex items-center justify-end px-6 py-3 bg-gray-100 text-right">
                <button
                  class="bg-indigo-500 text-white font-bold rounded hover:bg-indigo-700 shadow-md py-2 px-5 inline-flex items-center transition">
                  <span class="mr-2">Add New</span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" stroke-width="2"
                    width="12" height="12" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd">
                    <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z" />
                  </svg>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  @elsecan('lab_access')
    Sorry you're not admin
  @endcan
</x-app-layout>
