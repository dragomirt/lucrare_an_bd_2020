<?php echo view('templates/header', ['title' => "Rapoarte"]); ?>
    <div class="admin adminMain">
        <div class="container">
            <a href="/" class="home">Acasa</a>
            <div class="links">
                <a href="/admin/reports/time"><h3>Profit in functie de timp</h3></a>
                <a href="/admin/reports/listings"><h3>Profit in functie de oferta</h3></a>
                <a href="/admin/reports/options"><h3>Profit in functie de optiune</h3></a>
                <a href="/admin/reports/users"><h3>Profit in functie de utilizatori</h3></a>
            </div>
        </div>
    </div>
<?php echo view('templates/footer'); ?>