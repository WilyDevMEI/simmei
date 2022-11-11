@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data User</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Menu User</a></li>
            <li class="breadcrumb-item active">Edit Pengguna</li>
        </ol>

        <div class="card">
            <div class="card-header">Data Pengguna</div>
            <div class="card-body">
                <form action="{{ route('user.update', $user->id) }}" method="post" class="row needs-validation" novalidate>
                    @method('PUT')
                    @csrf
                    <div class="col-md-5 mb-2">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="name" id="name" autocomplete="off"
                            spellcheck="false" value="{{ $user->name }}" required>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" class="form-control" name="position" id="position" autocomplete="off"
                            spellcheck="false" value="{{ $user->position }}" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" autocomplete="off"
                            spellcheck="false" value="{{ $user->phone }}" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" autocomplete="off"
                            spellcheck="false" value="{{ $user->username }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Reset Password</label>
                        <div class="input-group flex-nowrap">
                            <button class="btn btn-outline-secondary" type="button" id="button-toggle-pass"><i
                                    class="fa-solid fa-eye"></i></button>
                            <input type="password" class="form-control" placeholder="Password" name="password"
                                id="password" value="{{ $user->password }}" required>
                        </div>
                        <div class="form-text">Password telah di enkripsi. Timpa jika memperbaharui</div>
                    </div>
                    <div class="my-3">
                        <button type="submit" class="btn btn-primary">Save Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        const btnTogglePass = document.querySelector('#button-toggle-pass');
        btnTogglePass.addEventListener('click', () => {
            const inputPassword = document.querySelector('#password');
            if (inputPassword.getAttribute('type') == 'text') {
                inputPassword.setAttribute('type', 'password')
                btnTogglePass.firstElementChild.classList.add('fa-eye');
                btnTogglePass.firstElementChild.classList.remove('fa-eye-slash');
            } else {
                inputPassword.setAttribute('type', 'text')
                btnTogglePass.firstElementChild.classList.remove('fa-eye');
                btnTogglePass.firstElementChild.classList.add('fa-eye-slash');
            }
        })
    </script>
@endpush
