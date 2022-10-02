@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Articles') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <a href="/article/create">Buat artikel baru</a><br />
                    @foreach($message as $links)
                    <a href="/article/{{ $links->id }}">{{$links->title}}</a>
                    <br />
                    @endforeach
                </div>
                {{$message->links()}}
            </div>
        </div>
    </div>
</div>
@endsection