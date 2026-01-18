<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Superadmin - Ecopoint++</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50">

    <div class="flex h-screen overflow-hidden">
        <!-- ================= SIDEBAR ================= -->
        @include('layouts.partial.sidebar')

        <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <!-- ================= HEADER ================= -->
            @include('layouts.partial.header')

            <!-- ================= MAIN CONTENT ================= -->
            <main class="flex-1 overflow-y-auto py-6 px-4">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>