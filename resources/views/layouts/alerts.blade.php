<div class="row mt-5 mb-1">
    <div class="col-md-6 mx-auto">
        @session('success')
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endsession

        @session('error')
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endsession
    </div>
</div>