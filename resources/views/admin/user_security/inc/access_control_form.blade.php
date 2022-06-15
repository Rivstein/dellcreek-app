<!-- Modal -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
  id="accessControlModal" tabindex="-1" aria-labelledby="accessControlModalLabel" aria-hidden="true">
  <div class="modal-dialog relative w-auto pointer-events-none">
    <div
      class="modal-content border border-gray-500 shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
      <div
        class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-500 rounded-t-md">
        <h5 class="text-xl font-medium leading-normal text-gray-800" id="accessControlModalLabel">
          @isset($value)
            Edit
          @else
            Create
          @endisset  
          {{ $type }}
        </h5>
        <button type="button"
          class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
          data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body relative p-4">

            <form action="{{ route('access_control.store',['type'=>$type,'id'=> isset($value) ? $value->id : null]) }}" id="access-control-form" method="POST">
                @csrf

                @isset($value)
                    @method('PATCH')
                @endisset
                
                {{-- name --}}
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $value->name ?? '' }}" class="form-input" required>
                </div>

                {{-- display name --}}
                <div class="mb-3">
                    <label>Display name</label>
                    <input type="text" name="display_name" value="{{ $value->display_name ?? '' }}" class="form-input" required>
                </div>

                {{-- type --}}
                @if ($type == 'permission')
                  <div class="mb-3">
                    <label>Type</label>
                    <input type="text" name="type" value="{{ $value->type ?? '' }}" class="form-input" required>
                  </div>    
                @endif

                {{-- description --}}
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-input" rows="3" required>{{ $value->description ?? '' }}</textarea>
                </div>

            </form>           
        
      </div>
      <div
        class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-500 rounded-b-md">
        <button form="access-control-form" class="btn-success">
          @isset($value)
            Edit
          @else
            Create
          @endisset
        </button>
      </div>
    </div>
  </div>
</div>