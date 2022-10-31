@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.partials._alert')

            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="my-auto">{{ __('Your Resume') }}</div>
                        <a href="/dashboard" class="btn btn-primary btn-sm" type="button">Dashboard</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-auto mx-auto mr-md-2">
                            <img src="{{ Helper::showImage($resume->avatar) }}" class="mb-3" style="width: 100px;" alt="Avatar" />

                        </div>
                        <div class="col-12 col-md">
                            Title: <b>{{ $resume->title }}</b>
                            <br>
                            Name: {{ $resume->name }}
                            <br>
                            Phone: {{ $resume->phone }}
                            <br>
                            Email: {{ $resume->email }}
                        </div>
                        <div class="col-12 col-md">
                            Status: <span class="badge {{ $resume->status->value == 1 ? 'bg-primary' : 'bg-danger'; }}">{{ $resume->status->description }}</span>
                            <br>
                            Template: {{ $resume->template->description }}
                            <div class="btn-group btn-group-sm d-flex mt-3">
                                <a href="/{{ $resume->unique_link }}" class="btn btn-primary btn-block" type="button">Show Resume</a>
                                <a href="/resume/edit/{{ $resume->id }}" class="btn btn-outline-secondary btn-block" type="button">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('experience.index')
            @include('education.index')


        </div>
    </div>
</div>
@endsection