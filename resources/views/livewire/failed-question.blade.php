<div class="overflow-x-auto">
    {{-- Be like water. --}}

    <div class="overflow-x-auto">
      @if (session()->has('message'))
    
      <div id="alert-border-3" class="flex p-4 mb-4 bg-green-100 border-t-4 border-green-500 dark:bg-green-200" role="alert">
        <svg class="flex-shrink-0 w-5 h-5 text-green-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div class="ml-3 text-sm font-medium text-green-700">
          {{ session('message') }}
        </div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 dark:bg-green-200 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 dark:hover:bg-green-300 inline-flex h-8 w-8"  data-dismiss-target="#alert-border-3" aria-label="Close">
          <span class="sr-only">Dismiss</span>
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
          
      @endif
    </div>

    



<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
  <div class="flex justify-between items-center pb-4">
      <div>
          {{-- <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
              <svg class="mr-2 w-4 h-4 text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
              Last 30 days
              <svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          </button>
          <!-- Dropdown menu -->
          <div id="dropdownRadio" class="z-10 w-48 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 block" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 46px);" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom">
              <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                  <li>
                      <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                          <input id="filter-radio-example-1" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                          <label for="filter-radio-example-1" class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last day</label>
                      </div>
                  </li>
                  <li>
                      <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                          <input checked="" id="filter-radio-example-2" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                          <label for="filter-radio-example-2" class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last 7 days</label>
                      </div>
                  </li>
                  <li>
                      <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                          <input id="filter-radio-example-3" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                          <label for="filter-radio-example-3" class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last 30 days</label>
                      </div>
                  </li>
                  <li>
                      <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                          <input id="filter-radio-example-4" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                          <label for="filter-radio-example-4" class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last month</label>
                      </div>
                  </li>
                  <li>
                      <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                          <input id="filter-radio-example-5" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                          <label for="filter-radio-example-5" class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last year</label>
                      </div>
                  </li>
              </ul>
          </div> --}}
      </div>
      <label for="table-search" class="sr-only">Search</label>
      <div class="relative">
          <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
              <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
          </div>
          <input wire:model="search" type="text" id="table-search" class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search using answered">
      </div>
  </div>
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 overflow-x-auto">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              {{-- <th scope="col" class="p-4">
                  <div class="flex items-center">
                      <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="checkbox-all-search" class="sr-only">checkbox</label>
                  </div>
              </th> --}}
              <th scope="col" class="py-3 px-6">
                  Name
              </th>
              <th scope="col" class="py-3 px-6">
                  Question
              </th>
              <th scope="col" class="py-3 px-6">
                  Answered?
              </th>
              <th scope="col" class="py-3 px-6">
                  Date
              </th>
              
              
              
          </tr>
      </thead>
      <tbody>
        @foreach($failed_question as $category)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              {{-- <td class="p-4 w-4">
                  <div class="flex items-center">
                      <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                  </div>
              </td> --}}
              <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{$category->name}}
              </th>
              <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{$category->question}}
              </th>
              <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{$category->answered}}
              </th>
              <td class="py-4 px-6">
                {{$category->created_at}}
              </td>
              
          </tr>

          @endforeach
          
         
          
         
         
      </tbody>
  </table>
</div>
<div class="my-3">
    {{$failed_question->links()}}
  </div>


   
   

    
</div>
