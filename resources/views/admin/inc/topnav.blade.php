{{-- ui --}}
<div class="admin-topnav px-4 py-2 shadow border-b border-b-gray-500 flex justify-between items-center">
	<div class="py-1">
		<h2 class=" font-bold text-lg">
			Dellcreek Admin
		</h2>
	</div>
	<div class="flex items-center">
		{{-- notification --}}
		<div class="dropdown relative mx-3">
			<button class="hover:text-blue-800 underline" id="countyDropdown" data-bs-toggle="dropdown"
				aria-expanded="false">
				<i class="fa-solid fa-bell"></i>
			</button>
			<div class="dropdown-menu absolute bg-white rounded w-80 min-w-full h-56 border border-gray-500 z-50 hidden"
				aria-labelledby="countyDropdown">

				{{-- notifications --}}
				<div class="h-5/6 overflow-y-auto bg-gray-100">
					@if (true)
						{{-- notification item --}}
						<a href="#" class="flex items-center m-2 px-2 py-1 bg-white hover:bg-gray-200 shadow-lg border border-gray-500">
							{{-- icon --}}
							<div>
								<div class="h-8 w-8 rounded-full shadow-lg text-white flex bg-yellow-600">
									<i class="fa fa-message m-auto"></i>
								</div>	
							</div>
							
							{{-- message --}}
							<div class="text-xs font-semibold p-2">
								<div>
									Lorem ipsum dolor sit amet consectetur.
								</div>
								<div class="font-bold mt-1">
									2 days ago
								</div>
							</div>
						</a>
					@else
						{{-- no notifications --}}
						<div class="flex mt-20">
							<div class="m-auto h-full">
								No notifications
							</div>
						</div>
					@endif
				</div>
				{{-- view all notifications --}}
				<div class="h-1/6 border-t border-t-gray-500 flex justify-center py-1">
					<a href="#" class="btn-light">
						<i class="fa-solid fa-clock-rotate-left pr-2"></i>
						View all notifications
					</a>
				</div>

			</div>
		</div>
		{{-- user dropdown --}}
		<div class="dropdown relative mx-3">
			<button class="hover:text-blue-800" id="countyDropdown" data-bs-toggle="dropdown" aria-expanded="false">
				<i class="fa-solid fa-user-circle"></i>
			</button>
			<div class="dropdown-menu absolute bg-white pb-4 rounded px-4 border border-gray-500 min-w-max list-none z-50 hidden"
				aria-labelledby="countyDropdown">
				user
			</div>
		</div>

		{{-- settings dropdown --}}
		<a href="#" class="hover:text-blue-800 mx-3">
			<i class="fa-solid fa-gear"></i>
		</a>
	</div>
</div>