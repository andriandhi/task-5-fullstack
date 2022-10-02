@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/articles">Artikel</a>{{ __(' | Update artikel') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('updateArticleSubmit',$message->id) }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Judul Artikel') }}</label>
                            <div class="col-md-6">
                                <input id="title" class="form-control" name="title" value="{{ $message->title }}" required autofocus>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('URL Gambar') }}</label>

                            <div class="col-md-6">
                                <input id="image" class="form-control" name="image" value="{{ $message->image }}" required>

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <label for="content" class="col-md-4 col-form-label text-md-end">{{ __('Konten') }}</label>
                            <div class="col-md-6">
                                <input id="content" class="form-control" name="content" value="{{ $message->content }}" required>

                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Kategori') }}</label>

                            <div class="col-md-6">
                                <input id="category" class="form-control" name="category" value="{{ $message->category->name }}" required>

                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection