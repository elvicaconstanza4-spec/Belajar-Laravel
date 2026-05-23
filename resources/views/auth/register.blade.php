<x-authentication>
    <h1>Register</h1>

    <form action="/register" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Nama">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password" >
        <input type="password" name="password" placeholder="Confirm Password" >

        <button type="submit">Register</button>
    </form>
</x-authentication>