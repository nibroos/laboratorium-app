<x-app-layout>
  <title>{{ $data['title'] }}</title>
  @can('user_access')
    <div>
      <div class="max-w-2xl mx-auto sm:p-0 lg:px-8">
        <div class="mt-5 md:mt-0 md:col-span-2">
          {{-- form start --}}
          <form method="post" action="{{ route('places.store') }}" enctype="multipart/form-data">
            @csrf
            {{-- hidden input id --}}
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
            <div class="overflow-hidden sm:rounded-md">
              <h1 class="text-center px-6 md:pt-8 text-2xl font-extrabold text-gray-900 xs:text-xl">Add Place</h1>
              <p class="mb-8 px-6 text-base text-center text-gray-500 text-opacity-75 xs:text-sm">Any new place that we
                can add?</p>
              <div class="border-t-4 border-indigo-400 bg-white rounded-lg">
                <div class="pt-4 grid grid-cols-1 divide-y divide-gray-300">
                  <div>
                    <h1 class="mb-4 px-6 text-2xl font-bold text-gray-900 xs:text-lg">General Information</h1>
                  </div>
                  <div></div>
                </div>
                {{-- place general input --}}
                <div class="p-6">
                  {{-- place name input --}}
                  <div class="mb-6 f-outline relative border focus-within:border-indigo-400">
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
                  {{-- place desc input --}}
                  <div class="mb-6 f-outline relative border focus-within:border-indigo-400">
                    <textarea type="text" name="place_desc" id="place_desc" placeholder=" "
                      class="block p-2 w-full text-lg appearance-none focus:outline-none bg-transparent resize-none"
                      rows="4" maxlength="255"></textarea>
                    <label for="place_desc"
                      class="absolute ml-3 px-2 top-0 text-lg text-gray-700 bg-white mt-2 -z-1 duration-300 origin-0">Place
                      Description<span class="text-red-600"> *</span></label>
                    @error('place_desc')
                      <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="grid grid-cols-1 mt-5">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload
                      Photo</label>
                    <div class='flex items-center justify-center w-full'>
                      <label
                        class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                        <div class='flex flex-col items-center justify-center pt-7'>
                          <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                          </svg>
                          <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>
                            Select a photo</p>
                        </div>
                        <input type='file' class="hidden" name="place_photo" accept="image/*" />
                      </label>
                    </div>
                  </div>
                  <div class="flex">
                    <a href="{{ $backurl }}"
                      class="hidden sm:mt-4 sm:mr-2 bg-white border border-indigo-500 text-indigo-500 font-bold rounded-md hover:text-white hover:border-indigo-700 hover:bg-indigo-700 py-2 px-5 sm:inline-flex items-center transition sm:w-full sm:justify-center sm:py-3">
                      <span class="mr-2 text-lg">Cancel</span>
                    </a>
                    <button type="submit"
                      class="hidden sm:mt-4 sm:ml-2 bg-indigo-500 text-white font-bold rounded-md hover:bg-indigo-700 py-2 px-5 sm:inline-flex items-center transition sm:w-full sm:justify-center sm:py-3">
                      <span class="mr-2 text-lg">Add</span>
                      <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" stroke-width="2"
                        width="12" height="12" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd">
                        <path
                          d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z" />
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
              {{-- submit button --}}
              <div class="flex items-center justify-end md:justify-center py-6 text-right sm:items-stretch sm:hidden">
                <a href="{{ $backurl }}"
                  class="cursor-pointer mr-4 bg-white border border-indigo-500 text-indigo-500 font-bold rounded hover:text-white hover:border-indigo-700 hover:bg-indigo-700 py-2 px-5 inline-flex items-center transition md:w-full md:justify-center md:py-3">
                  <span class="mr-2">Cancel</span>
                </a>
                <button type="submit"
                  class="bg-indigo-500 text-white font-bold rounded hover:bg-indigo-700 shadow-md py-2 px-5 inline-flex items-center transition md:w-full md:justify-center md:py-3">
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
