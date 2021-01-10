<?php echo view('templates/header', ['title' => "Profit -> timp"]); ?>
    <div class="admin users exchangesCreate">
        <div class="container">

            <a href="/admin">Înapoi</a>
            <h1>Profit in functie de utilizatori</h1>

            <?php if (isset($error)): ?>
                <p style="text-align: center"><?php echo $error; ?></p>
            <?php endif; ?>

            <?php if (isset($response)): ?>
                <h4 style="text-align: center"><?php echo $response; ?></h4>
            <?php endif; ?>

            <br><br>
            <form action="/admin/reports/users" method="POST">
                <label for="name">Identificatorul Utilizatorului:</label>
                <input type="number" name="user_id">
                <br>
                <input type="submit" value="Raporteaza!">
            </form>


        </div>
    </div>
<?php echo view('templates/footer'); ?>