@extends('layouts.app')

@section('content')
    <div class="row my-5">
        <div class="col-md-6 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header bg-white text-center">
                    <h4>Login</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('login.link')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address*</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp">
                            @error('email')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-sm btn-dark">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection