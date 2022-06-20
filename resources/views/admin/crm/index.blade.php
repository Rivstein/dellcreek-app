@extends('layouts.admin' , ['title' => 'Customer relation manager'])

@section('admincss')
    <link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">
@endsection

@section('page')

    {{-- dev notice alert --}}
    @include('admin.alert.dev_notice',[
        'devMessage' => 'Email features are offline, Development and security testing is still incomplete. issue #5412'
        ])
    
    {{-- request btn--}}
    <div class="flex space-x-4">

        {{-- site visit --}}
        <div>
            <a href="{{ url('#') }}" class="btn-secondary">
                <span>Site Visit Requests</span>
            </a>
        </div>

        {{-- newsletter --}}
        <div>
            <a href="{{ url('#') }}" class="btn-secondary">
                <span>Newsletter Requests</span>
            </a>
        </div>

        {{-- contact --}}
        <div>
            <a href="{{ url('#') }}" class="btn-secondary">
                <span>Contact Requests</span>
            </a>
        </div>
    </div>

    {{-- table to show newsletter and contact  requests --}}
    <div class="my-5 bg-white border border-gray-500 rounded shadow-lg p-2">
        <table id="crmTable" class="display cell-border compact">
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Time</th>
                <th>Type</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @if(count($contacts) > 0 )
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{$contact->name ?? 'N/A'}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->phone_number}}</td>
                            <td>{{$contact->created_at->diffForHumans()}}</td>
                            <td>{{$contact->type}}</td>
                            <td>

                            </td>
                        </tr>
                    @endforeach    
                
                @else
                    <div class="text-red-600 font-bold">
                        No contact
                    </div>
                @endif
            </tbody>
        </table>    
    </div>

@endsection

@section('adminjs')
    <script src="{{ asset('datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#crmTable').DataTable({
                ordering:  false
            });
        });
    </script>
@endsection