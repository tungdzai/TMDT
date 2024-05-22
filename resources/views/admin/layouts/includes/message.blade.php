<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"></script>
@if (isset($errors) && $errors->any())
    @foreach ($errors->all() as $error)
        <script>
            Swal.fire({
                position: "center",
                icon: "error",
                title: "{{ $error }}" ,
                showConfirmButton: true,
                timer: 1500
            });
        </script>
        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach
@endif
@if (session()->get('flash_warning'))
    <script>
        Swal.fire({
            position: "center",
            icon: "warning",
            title: " {{ session()->get('flash_warning') }}" ,
            showConfirmButton: true,
            timer: 1500
        });
    </script>
@endif
@if (session()->get('flash_success'))
    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "{{ session()->get('flash_success') }}" ,
            showConfirmButton: true,
            timer: 1500
        });
    </script>
@endif
