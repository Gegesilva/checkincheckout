<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Checkin Checkout</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>

    <main class="login-page">
        <section class="login-card">
            <div class="logo-area">
                <span class="logo-placeholder">Logo</span>
            </div>

            <div class="login-header">
                <span class="login-eyebrow">Checkin - Checkout</span>
            </div>

            <form class="login-form" method="post" action="index.php">
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <div class="input-wrap">
                        <i class="bi bi-person"></i>
                        <input type="text" id="usuario" name="usuario" placeholder="Digite seu usuario" autocomplete="username" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <div class="input-wrap">
                        <i class="bi bi-lock"></i>
                        <input type="password" id="senha" name="senha" placeholder="Digite sua senha" autocomplete="current-password" required>
                    </div>
                </div>

                <button type="submit" class="btn-login">Entrar</button>
            </form>
        </section>
    </main>

</body>

</html>
