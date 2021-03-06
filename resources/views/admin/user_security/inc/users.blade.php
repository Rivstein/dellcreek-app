{{-- all system users data table --}}
<div class="my-2">
    @isset($users)
        <div class="my-5 bg-white border border-gray-500 rounded shadow-lg p-2">
            <table id="myTable" class="display cell-border compact">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Actions</th>
                </thead>
                <tbody class="text-sm">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>
                                <a href="" class="text-blue-500 hover:underline">
                                    {{ $user->email }}
                                </a>
                            </td>
                            <td>{{ $user->phone_number }}</td>
                            <td class="shadow-inner">
                                <a href="{{ url('user_edit/'.$user->id) }}">
                                    <i class="fa-solid fa-screwdriver-wrench p-2 text-green-500"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endisset
</div>
