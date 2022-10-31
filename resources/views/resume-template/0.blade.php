@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.partials._alert')

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto mx-auto mr-md-2">
                            <img src="{{ Helper::showImage($resume->avatar) }}" class="mb-3 mb-0" style="width: 100px;" alt="Avatar" />

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
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="my-auto">{{ __('Work Experience') }}</div>
                    </div>
                </div>

                <div class="card-body">
                    @foreach ($resume->experiences as $experience)
                    <div class="card my-2">
                        <div class="card-body">
                            <h3 class="fw-bold fs-5">{{ $experience->title }} - {{ $experience->employment_type->description }}</h3>
                            <div class="mb-3 fs-6 fw-normal">
                                {{ $experience->company_name }} - {{ $experience->location }} <br>
                                {{ $experience->start_month .' '.$experience->start_year }} - {{ $experience->currently_working->value == 1 ? 'Present' : $experience->start_year .' '.$experience->end_month }} <br>
                            </div>
                            <div class="fs-6 fw-light">{{ $experience->description }}</div>
                        </div>
                    </div>
                    @endforeach

                    @if(!$resume->experiences->first())
                    <div class="card border border-danger">
                        <div class="card-body text-center">
                            No record found.
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="my-auto">{{ __('Level Education') }}</div>
                    </div>
                </div>

                <div class="card-body">
                    @foreach ($resume->educations as $education)
                    <div class="card my-2">
                        <div class="card-body">
                            <h3 class="fw-bold fs-5">{{ $education->degree }}</h3>
                            <div class="mb-3 fs-6 fw-normal">
                                {{ $education->school }} <br>
                                {{ $education->start_month .' '.$education->start_year }} - {{ $education->end_month .' '.$education->end_year }} | Grade: {{ $education->grade }} <br>
                            </div>
                            <div class="fs-6 fw-light">{{ $education->description }}</div>
                        </div>
                    </div>
                    @endforeach

                    @if(!$resume->educations->first())
                    <div class="card border border-danger">
                        <div class="card-body text-center">
                            No record found.
                        </div>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection