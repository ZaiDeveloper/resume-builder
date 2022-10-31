@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.partials._alert')
            @include('layouts.partials._alert-form')

            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="my-auto">{{ __('Edit Resume') }}</div>
                        <a href="/resume/{{ $resume->id }}" class="btn btn-primary btn-sm" type="button">Back</a>
                    </div>
                </div>

                <div class="card-body">
                    {!! Form::open(['url' => 'resume/update/'.$resume->id, 'method'=>'POST', 'class'=>'', 'files' => true]) !!}

                    <div class="row mx-0 py-2">
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label>Title</label>
                                {!! Form::text('title', $resume->title ?? '', ['class'=>'form-control '.Helper::errorForm($errors, 'title')['class'], 'placeholder'=>'Ex: Resume 2022 (Feb) - Zai Zainal']) !!}
                                {!! Helper::errorForm($errors, 'title')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label>Name</label>
                                {!! Form::text('name', $resume->name ?? '', ['class'=>'form-control '.Helper::errorForm($errors, 'name')['class'], 'placeholder'=>'Enter name']) !!}
                                {!! Helper::errorForm($errors, 'name')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label>Phone</label>
                                {!! Form::number('phone', $resume->phone ?? '', ['class'=>'form-control '.Helper::errorForm($errors, 'phone')['class'], 'placeholder'=>'Enter phone']) !!}
                                {!! Helper::errorForm($errors, 'phone')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label>Email</label>
                                {!! Form::email('email', $resume->email ?? '', ['class'=>'form-control '.Helper::errorForm($errors, 'email')['class'], 'placeholder'=>'Enter email']) !!}
                                {!! Helper::errorForm($errors, 'email')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="type">Template</label>
                                {!! Form::select('template', $templates, $resume->template ?? null, ['class'=>'form-control '.Helper::errorForm($errors, 'template')['class'], 'placeholder'=>'Select template']); !!}
                                {!! Helper::errorForm($errors, 'template')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="type">Status</label>
                                {!! Form::select('status', $statuses, $resume->status ?? null, ['class'=>'form-control '.Helper::errorForm($errors, 'status')['class'], 'placeholder'=>'Select status']); !!}
                                {!! Helper::errorForm($errors, 'status')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label>Avatar</label>
                                <input type="file" name="avatar" class="form-control {!! Helper::errorForm($errors, 'avatar')['class'] !!}" multiple>
                                {!! Helper::errorForm($errors, 'avatar')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="">
                                <img class="object-cover" alt="resume" width="80" height="80" src="{{ Helper::showImage($resume->avatar) }}">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn btn-block" tabindex="4">
                                    Save
                                </button>
                            </div>

                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection