<!-- application/views/reservation_view.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Générer PDF pour une réservation</title>
</head>
<body>
    <h2>Entrer l'ID de la réservation pour générer le PDF</h2>
    <?php echo form_open('Reservation_c/generate_pdf'); ?>
        <label for="reservation_id">ID de la réservation:</label>
        <input type="text" id="reservation_id" name="reservation_id" required>
        <button type="submit">Générer PDF</button>
    <?php echo form_close(); ?>
</body>
</html>
