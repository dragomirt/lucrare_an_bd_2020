<?php echo view('templates/header', ['title' => "Admin Menu"]); ?>
    <div class="admin adminMain">
        <div class="container">
            <a href="/" class="home">Acasa</a>
            <div class="links">
                <a href="/admin/requests"><h3>Requesturile de contact</h3></a>
                <a href="/admin/users"><h3>Utilizatori</h3></a>
                <a href="/admin/option_types"><h3>Optiunile disponibile</h3></a>
                <a href="/admin/listings"><h3>Ofertele</h3></a>
                <a href="/admin/exchanges"><h3>Transactii</h3></a>
                <a href="/admin/reports"><h3>Rapoarte</h3></a>
            </div>
        </div>
    </div>
<?php echo view('templates/footer'); ?>