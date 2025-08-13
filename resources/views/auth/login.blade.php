<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capybara Cinema - Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-dark: #141414;
            --bg-input: #333333;
            --primary: #E50914;
            --text-light: #FFFFFF;
            --text-muted: #B3B3B3;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body,
        html {
            height: 100%;
            font-family: 'Arial', sans-serif;
            background: var(--bg-dark);
            color: var(--text-light);
        }

        #background {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.85) 0%, rgba(0, 0, 0, 0.95) 100%), url('https://source.unsplash.com/1600x900/?cinema,film') center/cover no-repeat;
        }

        form {
            background: rgba(20, 20, 20, 0.95);
            padding: 3rem;
            border-radius: 8px;
            width: 350px;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.6);
        }

        #form_title h2 {
            text-align: center;
            font-size: 2rem;
            color: var(--primary);
        }

        .input_module {
            position: relative;
            display: flex;
            align-items: center;
            background: var(--bg-input);
            border-radius: 4px;
            padding: 0.5rem 0.75rem;
        }

        .input_module label {
            margin-right: 0.5rem;
            color: var(--text-muted);
            cursor: pointer;
        }

        .input_module input {
            background: transparent;
            border: none;
            outline: none;
            color: var(--text-light);
            width: 100%;
            font-size: 1rem;
        }

        .password_button {
            position: absolute;
            right: 0.75rem;
            cursor: pointer;
            color: var(--text-muted);
        }

        .form_button {
            background: var(--primary);
            color: var(--text-light);
            border: none;
            padding: 0.75rem;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .form_button:hover {
            background: #b10610;
        }

        @media (max-width: 400px) {
            form {
                width: 90%;
                padding: 2rem;
            }
        }
    </style>
</head>

<body>
    <div id="background">
        <form action="{{ route('auth.login') }}" method="post">
            @csrf
            <div id="form_title">
                <h2>Faça o Login</h2>
            </div>

            <div>
                <p>test@example.com</p>
                <p>123</p>
            </div>

            <div class="input_module">
                <label for="email">
                    <i class="fa-solid fa-user"></i>
                </label>
                <input type="email" id="email" name="email" placeholder="Seu email" required>
            </div>

            <div class="input_module">
                <label for="password">
                    <i class="fa-solid fa-lock"></i>
                </label>
                <input type="password" id="password" name="password" placeholder="Sua senha" required>
                <label for="password" class="password_button" onclick="togglePassword()">
                    <i class="fa-solid fa-eye-slash" id="toggleIcon"></i>
                </label>
            </div>

            <button type="submit" class="form_button">Entrar</button>

            <!-- Link direto -->
            <div style="text-align: center; margin-top: 1rem;">
                <a href="{{ url('/movie') }}"
                    style="color: var(--primary); text-decoration: none; font-weight: bold; transition: color 0.2s;">
                    Continuar sem login
                </a>
            </div>

        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const icon = document.getElementById('toggleIcon');
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                passwordInput.type = "password";
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        }
    </script>
</body>

</html>