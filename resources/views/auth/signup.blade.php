<x-base-layout title="Signup" bodyClass="page-signup">
    <main>
        <div class="container-small page-login">
            <div class="flex" style="gap: 5rem">
                <div class="auth-page-form">
                    <div class="text-center">
                        <a href="/">
                            <img src="/img/logoipsum-265.svg" alt="" />
                        </a>
                    </div>
                    <h1 class="auth-page-title">Signup</h1>

                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Your Email" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Your Password" />
                        </div>
                        
                        <hr />
                        <div class="form-group">
                            <input type="text"name="name" placeholder="Name" />
                        </div>
                        <button type="submit" class="btn btn-primary btn-login w-full">Register</button>

                        <div class="grid grid-cols-2 gap-1 social-auth-buttons">
                            <x-google-button />
                            <x-fb-button />

                        </div>
                        <div class="login-text-dont-have-account">
                            Already have an account? -
                            <a href="{{ route('login') }}"> Click here to login </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-base-layout>
