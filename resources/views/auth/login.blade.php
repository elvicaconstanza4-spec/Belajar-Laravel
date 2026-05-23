<x-authentication>

    <h1>Login</h1>
    <form action="/login" method="POST">
        @csrf

        <input type="email" name="email" placeholder="email" >
        <input type="password" name="password" placeholder="password" >

        <button type="submit">Login</button>
    </form>
</x-authentication>