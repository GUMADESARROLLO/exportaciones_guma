@extends('layouts.app')

@section('content')
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="feather icon-unlock auth-icon"></i>
                    </div>
                    <img src="{{ asset('images/img_avatar.png') }}" width="70%" class="mb-3"><hr>
                    <h5 class="mb-4 mt-3">Una Promoción para ti</h5>
                    
                    <p class="mb-2 text-muted"><?php echo "Unimark S.A. Copyright ".date("Y").""?></p>
                </div>
            </div>
        </div>
    </div>
@endsection
