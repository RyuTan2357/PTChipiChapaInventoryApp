<div class="text-end mb-3">
    @auth
        Hello, <strong>{{ auth()->user()->name }}</strong>
    @endauth

    @guest
        Welcome, Guest
    @endguest
</div>