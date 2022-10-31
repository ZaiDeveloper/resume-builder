<div class="card mt-5">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div class="my-auto">{{ __('Work Experience') }}</div>
            <a href="/experience/create/{{ $resume->id }}" class="btn btn-primary btn-sm" type="button">Add Experience</a>
        </div>
    </div>

    <div class="card-body">
        @foreach ($resume->experiences as $experience)
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="fw-bold fs-5">{{ $experience->title }} - {{ $experience->employment_type->description }}</h3>
                <div class="mb-3 fs-6 fw-normal">
                    {{ $experience->company_name }} - {{ $experience->location }} <br>
                    {{ $experience->start_month .' '.$experience->start_year }} - {{ $experience->currently_working->value == 1 ? 'Present' : $experience->start_year .' '.$experience->end_month }} <br>
                </div>
                <div class="fs-6 fw-light">{{ $experience->description }}</div>
                {!! Form::open(['url' => 'experience/'.$experience->id, 'method'=>'POST', 'class'=>'d-inline']) !!}
                <input name="_method" type="hidden" value="DELETE">
                <div class="btn-group btn-group-sm d-flex mt-2">
                    <a href="/experience/edit/{{ $experience->id }}" class="btn btn-outline-secondary btn-block" type="button">Edit</a>
                    <a href="#" class="btn btn-outline-danger btn-block show-confirm" type="button">Delete</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        @endforeach

        @if(!$resume->experiences->first())
        <div class="card mb-3 border border-danger">
            <div class="card-body text-center">
                No record found.
                <br>
                <a href="/experience/create/{{ $resume->id }}" class="btn btn-primary btn-sm mt-2" type="button">Add work experience</a>
            </div>
        </div>
        @endif
    </div>
</div>

@push('addScripts')
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
</script>
@endpush