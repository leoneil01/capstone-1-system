<div class="topbar">
    <div class="toggle">
        <x-fas-list class="fas-icon"/>
    </div>
    <div class="user">
        <span class="fullname">{{Auth::user()->first_name . ' ' . Auth::user()->last_name}}</span>
        <img src="{{ asset('storage/img/user/' . Auth::user()->user_image) ?? asset('images/default_profile_image.jpg') }}" alt="User Image" class="user-img" draggable="false">
    </div>
</div>