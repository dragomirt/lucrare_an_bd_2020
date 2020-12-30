<?php echo view('templates/header', ['title' => "Admin Menu"]); ?>
    <div class="admin users usersShow">
        <div class="container">

            <a href="/admin">Înapoi</a>
            <h1>Info despre <?php echo $userData->first_name . " " . $userData->last_name; ?> </h1><a href="/admin/users/edit/<?php echo $userData->id; ?>">Modifica</a>
            <hr>

            <p>Email:</p>
            <p><b><?php echo $userData->email;?></b></p>

            <br>

            <p>Telefon:</p>
            <p><b><?php echo $userData->phone; ?></b></p>

            <br>

            <p>Bio:</p>
            <p><b><?php echo $userData->bio;?></b></p>

            <br>

            <p>Nascut pe:</p>
            <p><b><?php echo $userData->dob; ?></b></p>

            <br>

            <p>Inregistrat:</p>
            <p><b><?php echo $userData->created_at; ?></b></p>

        </div>
    </div>
<?php echo view('templates/footer'); ?>