{{-- login modal --}}
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
    id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog relative w-auto pointer-events-none">
        <div
            class="modal-content border border-gray-500 shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-none outline-none text-current">
            <div
                class="modal-header flex flex-shrink-0 items-center justify-between p-4 rounded-t-md">
                <button type="button"
                    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body relative p-4">

                {{-- login form --}}
                @include('auth.inc.login_form',['modal'=>true])

            </div>

        </div>
    </div>
</div>

{{-- register modal --}}
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
    id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerModalLabel"
    aria-hidden="true">
    <div class="modal-dialog relative w-auto pointer-events-none">
        <div
            class="modal-content border border-gray-500 shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-none outline-none text-current">
            <div
                class="modal-header flex flex-shrink-0 items-center justify-between p-4 rounded-t-md">
                <button type="button"
                    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body relative p-4">

                {{-- register form --}}
                @include('auth.inc.register_form',['modal'=>true])

            </div>

        </div>
    </div>
</div>