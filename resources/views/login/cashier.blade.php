<div class="modal fade" id="cashierLoginModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="cashierLoginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-5" id="cashierLoginModalLabel">Teacher Login</h1>
            </div>
            <form action="/process/login/cashier" method="POST">
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
                    <button class="btn btn-cancel" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
@if('showLoginModal' == 2 || ($errors->any() && ($errors->any() && session('showLoginModal') == 2))) {{-- Checks if the role of show modal is cashier and there are any errors--}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('adminLoginModal'), {
                backdrop: 'static'
            });
            myModal.show();
        });
    </script>
@endif