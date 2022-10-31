@if ($errors->any())
<div class="alert alert-danger print-error-msg" style="display: block;">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif