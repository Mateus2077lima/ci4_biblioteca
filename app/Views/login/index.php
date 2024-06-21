

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<br><br><br>
    <div class="container">
        <div class="row">
        <div class="col-md-4 offset-md-4">
            <center><h2>Faça Login</h2></center>
    <?php if (session()->has('error')): ?>
        <div class="alert alert-danger">
            <?= session()->get('error') ?>
        </div>
    <?php endif; ?>

    <form action="<?php echo base_url('login/authenticate'); ?>" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo old('email'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div><br>
                <center><button type="submit" class="btn btn-dark">Entrar</button></center>
            </form>
            </div>
    </div>
</div>

</body>