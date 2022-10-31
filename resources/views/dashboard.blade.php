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
                        <div class="my-auto">{{ __('My Resume') }}</div>
                        <a href="/resume/create" class="btn btn-primary btn-sm" type="button">Create Resume</a>
                    </div>
                </div>

                <div class="card-body">

                    @foreach ($resumes as $key => $resume)
                    <div class="card mb-3">
                        <div class="card-body">
                            <span class="fw-light fs-6">{{ $resume->title }} -
                                <span class="badge {{ $resume->status->value == 1 ? 'bg-primary' : 'bg-danger'; }}">{{ $resume->status->description }}</span>
                            </span>
                            <div class="fw-bold my-2">
                                {!! $resume->experince ? $resume->experince->title : 'No work experience (<a href="/experience/create/'.$resume->id.'">Setup Now</a>)' !!} <br>
                                {!! $resume->education ? $resume->education->degree : 'No education (<a href="/education/create/'.$resume->id.'">Setup Now</a>)' !!}
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" value="{{ config('app.url').'/'.$resume->unique_link }}" id="unique_link_{{$key}}" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button_copy">
                                <button class="btn btn-outline-secondary copy-text" type="button" id="button_copy" data-clipboard-target="#unique_link_{{$key}}">Copy</button>
                            </div>
                            {!! Form::open(['url' => 'resume/'.$resume->id, 'method'=>'POST', 'class'=>'d-inline']) !!}
                            <input name="_method" type="hidden" value="DELETE">
                            <div class="btn-group btn-group-sm d-flex">
                                <a href="{{ config('app.url').'/'.$resume->unique_link }}" target="_blank" class="btn btn-primary btn-block" type="button">Show Resume</a>
                                <a href="/resume/{{ $resume->id }}" class="btn btn-outline-secondary btn-block" type="button">Manage</a>
                                <a href="#" class="btn btn-outline-danger btn-block show-confirm" type="button">Delete</a>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    @endforeach

                    @if(!$resumes->first())
                    <div class="card mb-3 border border-danger">
                        <div class="card-body text-center">
                            No record found.
                            <br>
                            <a href="/resume/create" class="btn btn-primary btn-sm mt-2" type="button">Start creating your first resume</a>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addScripts')
<script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.show-confirm').click(function(event) {
        var form = $(this).closest("form");
        event.preventDefault();
        swal({
                title: `Are you sure you want to delete?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });

    var clipboard = new ClipboardJS('.copy-text');

    clipboard.on('success', function(e) {
        swal({
            icon: 'success',
            title: 'Copied',
            text: ("Successfully copied!"),
            buttons: false,
            timer: 2000
        })
    });
</script>
@endpush