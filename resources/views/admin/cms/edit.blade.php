@extends('layouts.admin', [
        'title' => 'Edit ' . $section->name,
        'breadcrumbs' => [
            $section->target => 'content_manager/'.$section->target
        ]
])

@section('page')
    <div class="mt-1">
        <div class=" border-b border-gray-500 ml-2">
            <a href="{{ $section->url }}" class="text-sm text-blue-800 hover:underline">
                {{ $section->url }}
            </a>
        </div>
        <form action="{{ route('content_manager_upload',['id' => $section->id]) }}" method="POST">
            @csrf
            <div class="my-4">
                <label class="block">Content</label>
                <textarea rows="5" class="form-input w-1/4" name="content" required>{{ $section->content }}</textarea>
            </div>
            <div class="my-4">
                <button class="btn-primary p-2" type="submit">
                    Update Content
                </button>
            </div>
        </form>
    </div>
@endsection
