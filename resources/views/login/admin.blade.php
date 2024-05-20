<div class="modal fade" id="adminLoginModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="adminLoginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-5" id="adminLoginModalLabel">Admin Login</h1>
            </div>
            <form action="/process/login/admin" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                        @error('username')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer border-top-0">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if('showLoginModal' == 1 || ($errors->any() && session('showLoginModal') == 1)) {{-- Checks if the role of show modal is admin and there are any errors--}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var adminModal = new bootstrap.Modal(document.getElementById('adminLoginModal'), {
                backdrop: 'static'
            });
            adminModal.show();
        });
    </script>
@endif