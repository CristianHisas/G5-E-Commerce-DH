@extends('layouts.app')
@section('csspersonal')
"{{ asset('/css/styles.css') }}"
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <p class="col-12">You are logged in!</p>
                        <a href="/cuenta/perfil" class="btn btn-primary mb-2 col-12">continuar</a>
                </div>
                
                    

            </div>
        </div>
    </div>
</div>
@endsection