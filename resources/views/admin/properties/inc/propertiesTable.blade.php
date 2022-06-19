{{-- table --}}
<div class="my-5 bg-white border border-gray-500 rounded shadow-lg p-2">
    <table id="myTable" class="display cell-border compact">
        <thead>
            <th>Name</th>
            <th>Title deed</th>
            <th>Price</th>
            <th>Size</th>
            <th>Status</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @if (isset($properties) && count($properties) > 0)
                @foreach ($properties as $property)
                    <tr class="text-sm">
                        <td>{{ $property->name }}</td>
                        <td>
                            @if ($property->hasTitle)
                                <div class="text-green-600 font-bold">
                                    Available
                                </div> 
                            @else
                                <div class="text-red-600 font-bold">
                                    Unavailable
                                </div>
                            @endif
                        </td>
                        <td class="font-bold">
                            Ksh {{ number_format($property->price) }}
                        </td>
                        <td>{{ $property->dimensions }}</td>
                        <td>
                            @if ($property->listed == true)
                                <div class="text-green-600 font-bold">
                                    Listed
                                </div>
                            @else
                                <div class="text-red-600 font-bold">
                                    Unlisted
                                </div>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('admin/properties/property/'.$property->id) }}" class="btn-primary text-xs p-1">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>     
                @endforeach                
            @endif
        </tbody>
    </table>    
</div>