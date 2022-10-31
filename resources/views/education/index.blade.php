<div class="card mt-5">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div class="my-auto">{{ __('Level Education') }}</div>
            <a href="/education/create/{{ $resume->id }}" class="btn btn-primary btn-sm" type="button">Add Education</a>
        </div>
    </div>

    <div class="card-body">
        @foreach ($resume->educations as $education)
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="fw-bold fs-5">{{ $education->degree }}</h3>
                <div class="mb-3 fs-6 fw-normal">
                    {{ $education->school }} <br>
                    {{ $education->start_month .' '.$education->start_year }} - {{ $education->end_month .' '.$education->end_year }} | Grade: {{ $education->grade }} <br>
                </div>
                <div class="fs-6 fw-light">{{ $education->description }}</div>
                {!! Form::open(['url' => 'education/'.$education->id, 'method'=>'POST', 'class'=>'d-inline']) !!}
                <input name="_method" type="hidden" value="DELETE">
                <div class="btn-group btn-group-sm d-flex mt-2">
                    <a href="/education/edit/{{ $education->id }}" class="btn btn-outline-secondary btn-block" type="button">Edit</a>
                    <a href="#" class="btn btn-outline-danger btn-block show-confirm" type="button">Delete</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        @endforeach

        @if(!$resume->educations->first())
        <div class="card mb-3 border border-danger">
            <div class="card-body text-center">
                No record found.
                <br>
                <a href="/education/create/{{ $resume->id }}" class="btn btn-primary btn-sm mt-2" type="button">Add level education</a>
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