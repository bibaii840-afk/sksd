<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Login Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0f1322] text-white min-h-screen flex items-center justify-center p-4 font-sans antialiased">

    <div class="w-full max-w-md bg-[#1c2135] rounded-2xl p-8 shadow-2xl border border-gray-800/60">
        
        <!-- Bagian Header (Logo L sudah dihapus) -->
        <div class="mb-7">
            <h1 class="text-2xl font-bold tracking-tight text-white">Selamat datang</h1>
            <p class="text-sm text-gray-400 mt-1">Masuk ke akun Anda untuk melanjutkan.</p>
        </div>

        <!-- Form Login -->
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Input Email -->
            <div>
                <label for="email" class="block text-xs font-medium text-gray-300 mb-2">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', 'admin@gmail.com') }}" required autofocus
                    placeholder="nama@email.com"
                    class="w-full px-4 py-2.5 bg-[#151929] border border-gray-700/70 rounded-lg text-sm text-white placeholder-gray-500 focus:outline-none focus:border-[#635bff] focus:ring-1 focus:ring-[#635bff] transition">
                @error('email')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Input Password -->
            <div>
                <label for="password" class="block text-xs font-medium text-gray-300 mb-2">Password</label>
                <div class="relative">
                    <input id="password" type="password" name="password" required value="password123"
                        placeholder="••••••••"
                        class="w-full px-4 py-2.5 bg-[#151929] border border-gray-700/70 rounded-lg text-sm text-white placeholder-gray-500 focus:outline-none focus:border-[#635bff] focus:ring-1 focus:ring-[#635bff] transition pr-14">
                    <button type="button" onclick="togglePassword()"
                        class="absolute inset-y-0 right-0 px-3.5 flex items-center text-xs text-gray-400 hover:text-gray-200 transition">
                        Lihat
                    </button>
                </div>
                @error('password')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bagian Mews Captcha -->
            <div>
                <label class="block text-xs font-medium text-gray-300 mb-2">Captcha</label>
                <div class="flex items-center gap-3 mb-2">
                    <div class="bg-white rounded-lg overflow-hidden p-1 flex items-center justify-center">
                        <img src="{{ captcha_src('flat') }}" alt="captcha" id="captcha-img" class="h-10 cursor-pointer" title="Klik untuk refresh">
                    </div>
                    <button type="button" onclick="refreshCaptcha()" 
                        class="px-3 py-2 bg-[#151929] border border-gray-700/70 hover:bg-gray-800 text-xs text-gray-300 rounded-lg transition">
                        Refresh
                    </button>
                </div>
                <input id="captcha" type="text" name="captcha" required
                    placeholder="Ketik teks di atas"
                    class="w-full px-4 py-2.5 bg-[#151929] border border-gray-700/70 rounded-lg text-sm text-white placeholder-gray-500 focus:outline-none focus:border-[#635bff] focus:ring-1 focus:ring-[#635bff] transition">
                @error('captcha')
                    <p class="text-red-400 text-xs mt-1">Kode captcha salah atau tidak sesuai.</p>
                @enderror
            </div>

            <!-- Checkbox Ingat Saya -->
            <div class="flex items-center pt-1">
                <input id="remember_me" type="checkbox" name="remember"
                    class="w-4 h-4 rounded bg-[#151929] border-gray-700 text-[#635bff] focus:ring-[#635bff]">
                <label for="remember_me" class="ml-2 text-xs text-gray-300">Ingat saya</label>
            </div>

            <!-- Tombol Masuk -->
            <button type="submit"
                class="w-full py-2.5 px-4 bg-[#635bff] hover:bg-[#5249f5] text-white font-medium text-sm rounded-lg transition shadow-md cursor-pointer mt-2">
                Masuk
            </button>
        </form>

        <!-- Kotak Info Akun Demo -->
        <div class="mt-5 p-4 rounded-xl border border-dashed border-gray-700/80 bg-[#151929]/50 text-xs text-gray-400 space-y-1">
            <p class="text-gray-400">Akun demo:</p>
            <p>Email <span class="text-gray-200 font-mono ml-1">admin@gmail.com</span></p>
            <p>Password <span class="text-gray-200 font-mono ml-1">password123</span></p>
        </div>

    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleBtn = event.currentTarget;
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleBtn.textContent = 'Sembunyikan';
            } else {
                passwordInput.type = 'password';
                toggleBtn.textContent = 'Lihat';
            }
        }

        function refreshCaptcha() {
            const captchaImg = document.getElementById('captcha-img');
            captchaImg.src = "{{ url('/captcha/flat') }}?" + Math.random();
        }
    </script>
</body>
</html>