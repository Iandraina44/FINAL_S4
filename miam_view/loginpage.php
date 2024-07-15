<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion</title>
</head>
<body>
    <?php echo form_open(site_url('Login_c/process_login')); ?>
    <input type="text" placeholder="Numéro" name="numero" required>
    
    <select name="type" required>
        <option value="">Sélectionner un type de voiture</option>
        <?php foreach ($types_voiture as $type): ?>
            <option value="<?php echo $type['id_type_voiture']; ?>"><?php echo $type['marque']; ?></option>
        <?php endforeach; ?>
    </select>
    
    <button type="submit">Connexion</button>
    <?php echo form_close(); ?>
</body>
</html>
