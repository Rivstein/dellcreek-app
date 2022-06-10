
{{-- ui --}}
<div class="admin-topnav px-4 py-2 shadow border-b border-b-gray-500 flex justify-between">
    <div class="py-1">
        <h2 class=" font-bold text-lg">
            Dellcreek Admin
        </h2>
    </div>
    <div class="flex">
        {{-- notification --}}
        <i class="fa-solid fa-bell text-xl pt-3"></i>
        {{-- logout dropdown --}}
        <div class="flex justify-center">
            <div>
              <div class="dropdown relative">
                <button
                  class="
                    dropdown-toggle
                    px-6
                    py-2.5
                    text-black
                    text-xl
                    leading-tight
                    uppercase
                    rounded
                    transition
                    duration-150
                    ease-in-out
                    flex
                    items-center
                    whitespace-nowrap
                  "
                  type="button"
                  id="dropdownMenuButton1"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                <i class="fa-solid fa-user"></i>
                </button>
                <ul
                  class="
                    dropdown-menu
                    min-w-max
                    absolute
                    hidden
                    bg-white
                    text-base
                    z-50
                    float-left
                    py-2
                    list-none
                    rounded-lg
                    shadow-lg
                    mt-1
                    hidden
                    m-0
                    bg-clip-padding
                    border-none
                  "
                  aria-labelledby="dropdownMenuButton1"
                >
                  <li>
                    <a
                      class="
                        dropdown-item
                        text-sm
                        py-2
                        px-4
                        font-normal
                        block
                        w-full
                        whitespace-nowrap
                        bg-transparent
                        text-gray-700
                        hover:bg-gray-100
                      "
                      href="#"
                      >Log out <i class="fa-solid fa-arrow-right-from-bracket pl-2"></i></a
                    >
                  </li>
                </ul>
              </div>
            </div>
        </div>

        {{-- settings dropdown --}}
        <div class="flex justify-center">
            <div>
              <div class="dropdown relative">
                <button
                  class="
                    dropdown-toggle
                    py-2.5
                    text-black
                    text-xl
                    leading-tight
                    uppercase
                    rounded
                    transition
                    duration-150
                    ease-in-out
                    flex
                    items-center
                    whitespace-nowrap
                  "
                  type="button"
                  id="dropdownMenuButton1"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                <i class="fa-solid fa-gear"></i>
                </button>
                <ul
                  class="
                    dropdown-menu
                    min-w-max
                    absolute
                    hidden
                    bg-white
                    text-base
                    z-50
                    float-left
                    py-2
                    list-none
                    rounded-lg
                    shadow-lg
                    mt-1
                    hidden
                    m-0
                    bg-clip-padding
                    border-none
                  "
                  aria-labelledby="dropdownMenuButton1"
                >
                  <li>
                    <a
                      class="
                        dropdown-item
                        text-sm
                        py-2
                        px-4
                        font-normal
                        block
                        w-full
                        whitespace-nowrap
                        bg-transparent
                        text-gray-700
                        hover:bg-gray-100
                      "
                      href="#"
                      >Reset Password </a
                    >
                  </li>
                </ul>
              </div>
            </div>
        </div>
    </div>
</div>
