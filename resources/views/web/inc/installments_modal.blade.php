<!-- Modal -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog relative w-auto pointer-events-none">
    <div
      class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
      <div
        class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
        <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">
            Monthly installments
        </h5>
        <button type="button"
          class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
          data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body relative p-4">

            {{-- info --}}
            <div class="bg-blue-200 p-4 text-xs font-semibold rounded-md mb-3">
                Enter the inital deposite you would like to pay and the number of
                months to calculate monthly installments and total amount to be paid.
            </div>

            {{-- min deposite --}}
            <div class="font-bold">
                Minimum deposite: {{ number_format($property->price*0.1) }}
            </div>

            {{-- forms --}}
            <div class="flex flex-wrap border border-gray-500 rounded-md">
                <div class="p-3 w-1/2">
                    <label>Initial deposite</label>
                    <input id="calc-deposite" type="number" class="form-input" value="{{ $property->price*0.1 }}">
                </div>
                <div class="p-3 w-1/2">
                    <label>No. months</label>
                    <select id="calc-months" class="form-input">
                        <option value="" disabled selected>Number of months</option>
                        @for ($i = 1; $i < 13; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                {{-- results --}}
                <div class="bg-gray-200 w-full text-xs m-3 p-3 font-bold">
                    <div class="mb-2">
                        Initial deposite:
                        <span class="text-sm" id="result-deposite"></span>
                    </div>
                    <div class="mb-2">
                        Monthly installments:
                        <span class="text-sm" id="result-installments"></span>
                    </div>
                    <div class="mb-2">
                        Payment period:
                        <span class="text-sm" id="result-period"></span>
                    </div>
                    <div class="mb-2">
                        Total amount:
                        <span class="text-sm" id="result-total"></span>
                    </div>
                </div>
            </div>
        
      </div>
      <div
        class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
        <button class="btn-secondary mx-3" data-bs-dismiss="modal">
            Close
        </button>
      </div>
    </div>
  </div>
</div>