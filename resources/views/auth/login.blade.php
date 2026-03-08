<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Phantom Cars</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #c0c0c0;
            --secondary: #1a1a1a;
            --accent: #ffffff;
            --bg: #0a0a0a;
            --card-bg: #141414;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-card {
            background: var(--card-bg);
            padding: 2.5rem;
            border-radius: 12px;
            border: 1px solid #333;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        h1 {
            text-align: center;
            font-weight: 700;
            letter-spacing: -1px;
            margin-bottom: 2rem;
            text-transform: uppercase;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.8rem;
            color: #888;
            text-transform: uppercase;
        }

        input {
            width: 100%;
            padding: 0.8rem;
            background: #000;
            border: 1px solid #444;
            border-radius: 4px;
            color: white;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 1rem;
            background: white;
            color: black;
            border: none;
            border-radius: 4px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
            text-transform: uppercase;
        }

        button:hover {
            background: #ccc;
        }

        .error {
            color: #ff4444;
            font-size: 0.8rem;
            margin-top: 0.5rem;
        }

        .links {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.9rem;
        }

        a {
            color: #888;
            text-decoration: none;
        }

        a:hover {
            color: white;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h1>Phantom Login</h1>
        
        <form action="{{ route('login') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit">Entrar</button>
        </form>

        <div class="links">
            <p>¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate</a></p>
            <p><a href="{{ route('coches.index') }}">← Volver al Showroom</a></p>
        </div>
    </div>
</body>
</html>
