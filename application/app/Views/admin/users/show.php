<?php echo view('templates/header', ['title' => "Admin Menu"]); ?>
    <div class="admin users usersShow">
        <div class="container">

            <a href="/admin">Înapoi</a>
            <h1>Info despre <?php echo $userData->first_name . " " . $userData->last_name; ?></h1>
            <hr>

<!--            --><?php //if (isset($error)): ?>
<!--                <p style="text-align: center">--><?php //echo $error; ?><!--</p>-->
<!--            --><?php //endif; ?>
<!---->
<!--            <form action="/admin/users/create" method="POST">-->
<!--                <label for="firstName">First Name</label>-->
<!--                <input type="text" name="firstName">-->
<!---->
<!--                <label for="lastName">Last Name</label>-->
<!--                <input type="text" name="lastName">-->
<!---->
<!--                <label for="email">Email</label>-->
<!--                <input type="email" name="email">-->
<!---->
<!--                <label for="dob">Day of Birth</label>-->
<!--                <input type="date" name="dob">-->
<!---->
<!--                <label for="phone">Phone</label>-->
<!--                <input type="text" name="phone">-->
<!---->
<!--                <textarea name="bio" id="bio" cols="30" rows="10" placeholder="Customer is from the Drochia district. Likes biking and hiking. Best places for him would be something in mountain area."></textarea>-->
<!---->
<!--                <input type="submit" value="Creeaza!">-->
<!--            </form>-->

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