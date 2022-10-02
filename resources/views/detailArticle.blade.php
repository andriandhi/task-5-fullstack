@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="/articles">Artikel</a>
                    {{ __(' | ') }}{{ $message->category->name}} | {{ $message->title}}
                </div>
                <img src="{{ $message->image}}" />
                <div class="card-body">
                    {{ $message->content}}
                </div>
                <a href="/article/{{ $message->id }}/update"><button type="submit" class="btn btn-primary">
                        {{ __('Edit') }}
                    </button></a>
                <a href="/article/{{ $message->id }}/delete"><button type="submit" class="btn btn-primary">
                        {{ __('Hapus') }}
                    </button></a>
            </div>
        </div>
    </div>
</div>
@endsection