<?php echo view('templates/header', ['title' => "Admin Menu"]); ?>
    <div class="admin adminMain">
        <div class="container">
            <a href="/" class="home">Acasa</a>
            <div class="links">
                <a href="/admin/requests"><h3>Requesturile de contact</h3></a>
            </div>
        </div>
    </div>
<?php echo view('templates/footer'); ?>