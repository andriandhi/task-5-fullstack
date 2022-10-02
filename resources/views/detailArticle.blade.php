@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $message->title}} | {{ $message->category->name}}</div>
                <img src="{{ $message->image}}" />
                <div class="card-body">
                    {{ $message->content}}
                </div>
                <a href="/article/{{ $message->id }}/update">Edit</a><br />
                <a href="/article/{{ $message->id }}/delete">Delete</a>
            </div>
        </div>
    </div>
</div>
@endsection