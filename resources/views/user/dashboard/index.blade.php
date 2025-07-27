@extends('user.layout.index')
@section('content')
<main class="mt-5 container-fluid">
    <div class="row">
        <div class="col-4">
            <div class="card shadow-sm border-start border-5 border-primary text-center">
                <div class="card-body">
                    <i class="bi bi-people-fill display-5 mb-3"></i>
                    <h2 class="card-title mb-2">Anggota</h2>
                    <div class="card-text">
                        <span class="fs-3">6</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow-sm border-start border-5 border-secondary text-center">
                <div class="card-body">
                    <i class="bi bi-diagram-3-fill display-5 mb-3"></i>
                    <h2 class="card-title mb-2">Divisi</h2>
                    <div class="card-text">
                        <span class="fs-3">6</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow-sm border-start border-5 border-success text-center">
                <div class="card-body">
                    <i class="bi bi-person-plus-fill display-5 mb-3"></i>
                    <h2 class="card-title mb-2">Bergabung</h2>
                    <div class="card-text">
                        <span class="fs-3">6</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection