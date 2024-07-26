<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold mb-4">Register</h1>
        <form action="/jual-barang/pengguna/register" method="POST">
            <div class="mb-4">
                <label for="nama_pengguna" class="block text-gray-700">Username:</label>
                <input type="text" name="nama_pengguna" id="nama_pengguna" class="w-full border px-2 py-1 rounded" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password:</label>
                <input type="password" name="password" id="password" class="w-full border px-2 py-1 rounded" required>
            </div>
            <div class="mb-4">
                <label for="nama_depan" class="block text-gray-700">First Name:</label>
                <input type="text" name="nama_depan" id="nama_depan" class="w-full border px-2 py-1 rounded" required>
            </div>
            <div class="mb-4">
                <label for="nama_belakang" class="block text-gray-700">Last Name:</label>
                <input type="text" name="nama_belakang" id="nama_belakang" class="w-full border px-2 py-1 rounded" required>
            </div>
            <div class="mb-4">
                <label for="no_hp" class="block text-gray-700">Phone Number:</label>
                <input type="text" name="no_hp" id="no_hp" class="w-full border px-2 py-1 rounded" required>
            </div>
            <div class="mb-4">
                <label for="alamat" class="block text-gray-700">Address:</label>
                <textarea name="alamat" id="alamat" class="w-full border px-2 py-1 rounded" required></textarea>
            </div>
            <!-- <div class="mb-4">
                <label for="id_akses" class="block text-gray-700">Access Level:</label>
                <input type="number" name="id_akses" id="id_akses" class="w-full border px-2 py-1 rounded" required>
            </div> -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Register</button>
        </form>
        <div class="mt-4 text-center">
            <a href="/jual-barang/pengguna/login" class="text-blue-500">Already have an account? Login here</a>
        </div>
    </div>
</body>

</html>