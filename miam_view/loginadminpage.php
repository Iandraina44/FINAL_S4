<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion</title>
</head>
<body>
    <?php echo form_open(site_url('Login_c/process_login_admin')); ?>
    <input type="text" placeholder="username" name="email" required>
    <input type="password" placeholder="password" name="mdp" required>
    
    <button type="submit">Connexion</button>
    <?php echo form_close(); ?>
</body>
</html>
