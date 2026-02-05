<x-app-layout>

    <main>
        <div class="container-small page-login">
            <div class="flex" style="gap: 5rem">
                <div class="auth-page-form">
                    <div class="text-center">
                        <a href="/">
                            <img src="/img/logoipsum-265.svg" alt="" />
                        </a>
                    </div>
                    <h1 class="auth-page-title">Login</h1>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Your Email" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Your Password" />
                        </div>
                        <div class="text-right mb-medium">
                            <a href="/password-reset.html" class="auth-page-password-reset">Reset Password</a>
                        </div>

                        <button type="submit" class="btn btn-primary btn-login w-full">Login</button>

                        <div class="grid grid-cols-2 gap-1 social-auth-buttons">
                            <x-google-button />
                            <x-fb-button />
                        </div>
                        <div class="login-text-dont-have-account">
                            Don't have an account? -
                            <a href="{{ route('register') }}"> Click here to create  one</a>
                        </div>
                    </form>
                </div>
            
            </div>
        </div>
    </main>
</x-app-layout>
