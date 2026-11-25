<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | {{ config('app.name') }}</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root { --bg: #f1f5f9; --card: #fff; --text: #0f172a; --muted: #64748b; --primary: #4f46e5; }
        @media (prefers-color-scheme: dark) {
            :root { --bg: #0f172a; --card: #1e293b; --text: #f1f5f9; --muted: #94a3b8; --primary: #6366f1; }
        }
        body { font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif; background: var(--bg); color: var(--text); min-height: 100vh; }
        header { background: var(--card); padding: 1rem 1.5rem; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 1px 4px rgba(0,0,0,.08); }
        header strong { font-size: 1.1rem; }
        button { background: var(--primary); color: #fff; border: 0; border-radius: 8px; padding: .5rem 1rem; font-size: .9rem; cursor: pointer; }
        main { max-width: 720px; margin: 2rem auto; padding: 0 1.5rem; }
        .card { background: var(--card); border-radius: 14px; padding: 2rem; box-shadow: 0 6px 20px rgba(15,23,42,.08); }
        h1 { font-size: 1.4rem; margin-bottom: .5rem; }
        p { color: var(--muted); }
    </style>
</head>
<body>
    <header>
        <strong>{{ config('app.name') }}</strong>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Keluar</button>
        </form>
    </header>
    <main>
        <div class="card">
            <h1>Halo, {{ auth()->user()->name }}!</h1>
            <p>Anda berhasil login sebagai {{ auth()->user()->email }}.</p>
        </div>
    </main>
</body>
</html>
