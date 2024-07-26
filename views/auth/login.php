<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold mb-4">Login</h1>
        <form action="/jual-barang/pengguna/login" method="POST">
            <div class="mb-4">
                <label for="nama_pengguna" class="block text-gray-700">Username:</label>
                <input type="text" name="nama_pengguna" id="nama_pengguna" class="w-full border px-2 py-1 rounded" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password:</label>
                <input type="password" name="password" id="password" class="w-full border px-2 py-1 rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Login</button>
        </form>
        <div class="mt-4 text-center">
            <a href="/jual-barang/pengguna/register" class="text-blue-500">Don't have an account? Register here</a>
        </div>
    </div>
</body>

</html>