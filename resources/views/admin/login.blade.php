<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Login - Yuvalay Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] },
                    colors: { brand: { 600: '#059669', 700: '#047857' } }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-100 flex items-center justify-center min-h-screen p-4 font-sans text-slate-800">

    <div class="max-w-md w-full bg-white rounded-3xl p-8 sm:p-10 shadow-xl border border-slate-200/60 space-y-6">
        
        <div class="text-center space-y-2">
            <div class="w-12 h-12 rounded-2xl bg-emerald-600 text-white font-extrabold flex items-center justify-center text-xl mx-auto shadow-md shadow-emerald-500/20">
                Y
            </div>
            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Staff Portal Login</h1>
            <p class="text-xs text-slate-500">Sign in to manage Yuvalay enquiries, events, and content.</p>
        </div>

        @if($errors->any())
        <div class="p-3 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-xs font-semibold">
            {{ $errors->first() }}
        </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Email Address</label>
                <input type="email" name="email" value="{{ old('email', 'admin@yuvalay.org') }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Password</label>
                <input type="password" name="password" required value="yuvalay2026" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
            </div>

            <div class="flex items-center justify-between text-xs">
                <label class="flex items-center gap-2 text-slate-600">
                    <input type="checkbox" name="remember" class="rounded border-slate-300 text-emerald-600">
                    <span>Remember me</span>
                </label>
                <span class="text-slate-400">Default: yuvalay2026</span>
            </div>

            <button type="submit" class="w-full py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-sm shadow-md transition-all">
                Sign In to Dashboard &rarr;
            </button>
        </form>

        <div class="text-center pt-2">
            <a href="{{ route('home') }}" class="text-xs font-semibold text-slate-500 hover:text-slate-900">&larr; Back to Public Website</a>
        </div>

    </div>

</body>
</html>
