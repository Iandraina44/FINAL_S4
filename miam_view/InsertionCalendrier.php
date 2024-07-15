<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insertion Calendrier</title>
</head>
<body>
    <h1>Insertion Calendrier</h1>
    <?php echo form_open('InsertionCalendrier_c/insert'); ?>

    <input type="hidden" id="date" name="date" value="<?php echo $date; ?>">

    <div>
        <label for="heure_debut">Heure de Début</label>
        <input type="time" id="heure_debut" name="heure_debut" required>
    </div>

    <div>
        <label for="client">Client</label>
        <select id="client" name="client" required>
            <?php foreach ($all_client as $client): ?>
                <option value="<?php echo $client['id']; ?>"><?php echo $client['numero']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label for="voiture">Type de service</label>
        <select id="voiture" name="voiture" required>
            <?php foreach ($all_service as $voiture): ?>
                <option value="<?php echo $voiture['idService']; ?>"><?php echo $voiture['nom_service']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <button type="submit">Insérer</button>
    </div>

    <?php echo form_close(); ?>
</body>
</html>
