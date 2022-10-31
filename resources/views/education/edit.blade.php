@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.partials._alert')

            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="my-auto">{{ __('Edit Education') }}</div>
                        <a href="/resume/{{ $education->resume_id }}" class="btn btn-primary btn-sm" type="button">Back</a>
                    </div>
                </div>

                <div class="card-body">
                    {!! Form::open(['url' => 'education/update/'.$education->id, 'method'=>'POST', 'class'=>'', 'files' => true]) !!}

                    {!! Form::hidden('resume_id', request()->id); !!}

                    <div class="row mx-0 py-2">
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label>School</label>
                                {!! Form::text('school', $education->school ?? '', ['class'=>'form-control '.Helper::errorForm($errors, 'school')['class'], 'placeholder'=>'Ex: Universiti Teknologi MARA (UiTM) ']) !!}
                                {!! Helper::errorForm($errors, 'school')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label>Degree</label>
                                {!! Form::text('degree', $education->degree ?? '', ['class'=>'form-control '.Helper::errorForm($errors, 'degree')['class'], 'placeholder'=>'Ex: DIPLOMA IN COMPUTER SCIENCE']) !!}
                                {!! Helper::errorForm($errors, 'degree')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label>Start Month</label>
                                {!! Form::text('start_month', $education->start_month ?? '', ['class'=>'form-control '.Helper::errorForm($errors, 'start_month')['class'], 'placeholder'=>'Ex: January']) !!}
                                {!! Helper::errorForm($errors, 'start_month')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label>Start Year</label>
                                {!! Form::number('start_year', $education->start_year ?? '', ['class'=>'form-control '.Helper::errorForm($errors, 'start_year')['class'], 'placeholder'=>'Ex: 2012']) !!}
                                {!! Helper::errorForm($errors, 'start_year')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label>End Month</label>
                                {!! Form::text('end_month', $education->end_month ?? '', ['class'=>'form-control '.Helper::errorForm($errors, 'end_month')['class'], 'placeholder'=>'Ex: November']) !!}
                                {!! Helper::errorForm($errors, 'end_month')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label>End Year</label>
                                {!! Form::number('end_year', $education->end_year ?? '', ['class'=>'form-control '.Helper::errorForm($errors, 'end_year')['class'], 'placeholder'=>'Ex: 2022']) !!}
                                {!! Helper::errorForm($errors, 'end_year')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label>Grade</label>
                                {!! Form::number('grade', $education->grade ?? '', ['class'=>'form-control '.Helper::errorForm($errors, 'grade')['class'], 'placeholder'=>'Ex: 3.50', 'step'=>'.01']) !!}
                                {!! Helper::errorForm($errors, 'grade')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label>Description</label>
                                {!! Form::textarea('description', $education->description ?? '', ['class'=>'form-control '.Helper::errorForm($errors, 'description')['class'], 'placeholder'=>'Ex: I have involved in development mobile apps application as a...']) !!}
                                {!! Helper::errorForm($errors, 'description')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label>sort</label>
                                {!! Form::number('sort', $education->sort ?? '', ['class'=>'form-control '.Helper::errorForm($errors, 'sort')['class'], 'placeholder'=>'Ex: 1']) !!}
                                {!! Helper::errorForm($errors, 'sort')['message'] !!}
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