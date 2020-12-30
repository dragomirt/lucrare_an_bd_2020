<?php echo view('templates/header', ['title' => "Admin Menu"]); ?>
    <div class="admin users usersCreate">
        <div class="container">

            <a href="/admin">Înapoi</a>
            <h1>Creeaza Utilizator</h1>

            <?php if (isset($error)): ?>
                <p style="text-align: center"><?php echo $error; ?></p>
            <?php endif; ?>

            <form action="<?php echo isset($userData) ? '/admin/users/edit': '/admin/users/create'; ?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $userData->id; ?>">

                <label for="firstName">First Name</label>
                <input type="text" name="firstName" value="<?php echo $userData->first_name; ?>">

                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" value="<?php echo $userData->last_name; ?>">

                <label for="email">Email</label>
                <input type="email" name="email" value="<?php echo $userData->email; ?>">

                <label for="dob">Day of Birth</label>
                <input type="date" name="dob" value="<?php echo $userData->dob; ?>">

                <label for="phone">Phone</label>
                <input type="text" name="phone" value="<?php echo $userData->phone; ?>">

                <textarea name="bio" id="bio" cols="30" rows="10" value="<?php echo $userData->bio; ?>" placeholder="Customer is from the Drochia district. Likes biking and hiking. Best places for him would be something in mountain area."><?php echo $userData->bio; ?></textarea>

                <input type="submit" value="<?php echo isset($userData) ? 'Actualizeaza!' : 'Creeaza!'; ?>">
            </form>


        </div>
    </div>
<?php echo view('templates/footer'); ?>