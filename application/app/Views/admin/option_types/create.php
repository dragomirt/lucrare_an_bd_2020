<?php echo view('templates/header', ['title' => "Admin Menu"]); ?>
    <div class="admin users usersCreate">
        <div class="container">

            <a href="/admin">Înapoi</a>
            <h1>Creeaza Optiune</h1>

            <?php if (isset($error)): ?>
                <p style="text-align: center"><?php echo $error; ?></p>
            <?php endif; ?>

            <?php $issetOptionData = isset($optionData); ?>
            <form action="<?php echo isset($optionData) ? '/admin/option_types/edit': '/admin/option_types/create'; ?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $issetOptionData ? $optionData->id : ''; ?>">

                <label for="name">Denumirea Optiunii</label>
                <input type="text" name="name" value="<?php echo $issetOptionData ? $optionData->name : ''; ?>">

                <input type="submit" value="<?php echo isset($optionData) ? 'Actualizeaza!' : 'Creeaza!'; ?>">
            </form>


        </div>
    </div>
<?php echo view('templates/footer'); ?>