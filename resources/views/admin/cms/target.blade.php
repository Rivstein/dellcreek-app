@extends('layouts.admin', [
    'title' => $targetName . ' website content',
    'breadcrumbs' => [
        'CMS' => 'content_manager'
    ]
])

@section('admincss')
    <link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">
@endsection

@section('page')
    {{-- data tables based on target name --}}
    @isset($targetName)
        <div class="my-5 bg-white border border-gray-500 rounded shadow-lg p-2">
            <table id="myTable" class="display cell-border compact">
                <thead>
                    <th>Name</th>
                    <th>Content</th>
                    <th>URL</th>
                    <th>Updated by</th>
                    <th>Actions</th>
                </thead>
                <tbody class="text-sm">
                    @foreach ($webContents as $webContent)
                        <tr>
                            <td>{{ $webContent->name }}</td>
                            <td class="text-sm">
                                {{ $webContent->content }}
                            </td>
                            <td>
                                <a href="{{ $webContent->url }}" class="text-blue-500 font-xs underline">
                                    {{ $webContent->url }}
                                </a>
                            </td>
                            <td>
                                <a href="#" class="text-blue-800 underline">
                                    {{ $webContent->updatedBy->name ?? '' }}
                                </a>
                            </td>
                            <td class="shadow-inner">
                                <a href="{{ url('content/'.$webContent->id) }}">
                                    <i class="fa-solid fa-screwdriver-wrench p-2 text-green-500"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endisset
@endsection

@section('adminjs')
    <script src="{{ asset('datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                ordering: false
            });
        });
    </script>
@endsection
