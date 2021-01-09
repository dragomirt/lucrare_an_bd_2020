<?php echo view('templates/header', ['title' => "Admin Menu"]); ?>
    <div class="admin users usersCreate">
        <div class="container">

            <a href="/admin">Înapoi</a>
            <h1>Creeaza Utilizator</h1>

            <?php if (isset($error)): ?>
                <p style="text-align: center"><?php echo $error; ?></p>
            <?php endif; ?>

            <?php $issetUser = isset($userData); ?>
            <form action="<?php echo $issetUser ? '/admin/users/edit': '/admin/users/create'; ?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $issetUser ? $userData->id : ''; ?>">

                <label for="firstName">First Name</label>
                <input type="text" name="firstName" value="<?php echo $issetUser ? $userData->first_name : ''; ?>">

                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" value="<?php echo $issetUser ? $userData->last_name : ''; ?>">

                <label for="email">Email</label>
                <input type="email" name="email" value="<?php echo $issetUser ? $userData->email : ''; ?>">

                <label for="dob">Day of Birth</label>
                <input type="date" name="dob" value="<?php echo $issetUser ? $userData->dob : ''; ?>">

                <label for="phone">Phone</label>
                <input type="text" name="phone" value="<?php echo $issetUser ? $userData->phone : ''; ?>">

                <textarea name="bio" id="bio" cols="30" rows="10" value="<?php echo $issetUser ? $userData->bio : ''; ?>" placeholder="Customer is from the Drochia district. Likes biking and hiking. Best places for him would be something in mountain area."><?php echo $issetUser ? $userData->bio : ''; ?></textarea>

                <input type="submit" value="<?php echo isset($userData) ? 'Actualizeaza!' : 'Creeaza!'; ?>">
            </form>


        </div>
    </div>
<?php echo view('templates/footer'); ?>