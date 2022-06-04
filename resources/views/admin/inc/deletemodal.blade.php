{{-- 
    Takes -> [
        'id' // this is the modal id
        'item' // item name/value : has default ('item')string
        'url' // the delete link
    ]    
--}}

<!-- Modal -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
  id="{{ $id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="{{ $id }}Label" aria-hidden="true">
  <div class="modal-dialog shadow-2xl relative w-auto pointer-events-none">
    <div
      class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
      <div
        class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
        <h5 class="text-xl font-medium leading-normal text-gray-800" id="{{ $id }}Label">
            <i class="fa-solid fa-triangle-exclamation pr-2 text-red-600"></i>
            Delete
        </h5>
        <button type="button"
          class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
          data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body relative p-4">
         <h1 class="font-bold text-2xl text-center">
             Are you sure you want to delete this
             {{ $item ?? 'item' }}?
         </h1>
      </div>
      <div
        class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
        
        <a href="{{ $url }}" class="btn-danger mx-3">
            Delete
        </a>

        <button class="btn-secondary mx-3" data-bs-dismiss="modal">
            Cancel
        </button>
      </div>
    </div>
  </div>
</div>