@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.partials._alert')

            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="my-auto">{{ __('Create Experience') }}</div>
                        <a href="/resume/{{ request()->id }}" class="btn btn-primary btn-sm" type="button">Back</a>
                    </div>
                </div>

                <div class="card-body">
                    {!! Form::open(['url' => 'experience/store', 'method'=>'POST', 'class'=>'', 'files' => true]) !!}

                    {!! Form::hidden('resume_id', request()->id); !!}

                    <div class="row mx-0 py-2">
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label>Title</label>
                                {!! Form::text('title', '', ['class'=>'form-control '.Helper::errorForm($errors, 'title')['class'], 'placeholder'=>'Ex: Software Developer (PHP)']) !!}
                                {!! Helper::errorForm($errors, 'title')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="type">Employment Type</label>
                                {!! Form::select('employment_type', $employmentTypes, null, ['class'=>'form-control '.Helper::errorForm($errors, 'employment_type')['class'], 'placeholder'=>'Select employment type']); !!}
                                {!! Helper::errorForm($errors, 'employment_type')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label>Company Name</label>
                                {!! Form::text('company_name', '', ['class'=>'form-control '.Helper::errorForm($errors, 'company_name')['class'], 'placeholder'=>'Ex: 4 thirteen Group Sdn Bhd']) !!}
                                {!! Helper::errorForm($errors, 'company_name')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label>Location</label>
                                {!! Form::text('location', '', ['class'=>'form-control '.Helper::errorForm($errors, 'location')['class'], 'placeholder'=>'Ex: Kuala Lumpur, Malaysia']) !!}
                                {!! Helper::errorForm($errors, 'location')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label>Start Month</label>
                                {!! Form::text('start_month', '', ['class'=>'form-control '.Helper::errorForm($errors, 'start_month')['class'], 'placeholder'=>'Ex: January']) !!}
                                {!! Helper::errorForm($errors, 'start_month')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label>Start Year</label>
                                {!! Form::number('start_year', '', ['class'=>'form-control '.Helper::errorForm($errors, 'start_year')['class'], 'placeholder'=>'Ex: 2012']) !!}
                                {!! Helper::errorForm($errors, 'start_year')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                {!! Form::checkbox('currently_working', 1, false, ['id'=>'currently_working']) !!}
                                <label class="" for="currently_working"> I am currently working in this role</label>
                                {!! Helper::errorForm($errors, 'currently_working')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 present-work">
                            <div class="mb-3">
                                <label>End Month</label>
                                {!! Form::text('end_month', '', ['class'=>'form-control '.Helper::errorForm($errors, 'end_month')['class'], 'placeholder'=>'Ex: November']) !!}
                                {!! Helper::errorForm($errors, 'end_month')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 present-work">
                            <div class="mb-3">
                                <label>End Year</label>
                                {!! Form::number('end_year', '', ['class'=>'form-control '.Helper::errorForm($errors, 'end_year')['class'], 'placeholder'=>'Ex: 2022']) !!}
                                {!! Helper::errorForm($errors, 'end_year')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label>Description</label>
                                {!! Form::textarea('description', '', ['class'=>'form-control '.Helper::errorForm($errors, 'description')['class'], 'placeholder'=>'Ex: Responsible to maintain their primary product...']) !!}
                                {!! Helper::errorForm($errors, 'description')['message'] !!}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label>sort</label>
                                {!! Form::number('sort', '', ['class'=>'form-control '.Helper::errorForm($errors, 'sort')['class'], 'placeholder'=>'Ex: 1']) !!}
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

@push('addScripts')
<script type="text/javascript">
    $('#currently_working').change(function() {
        hideEnd();
    });

    function hideEnd() {
        if ($('#currently_working').is(':checked')) {
            $(".present-work").hide();
        } else {
            $(".present-work").show();
        }
    }
</script>
@endpush