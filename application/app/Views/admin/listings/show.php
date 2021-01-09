<?php echo view('templates/header', ['title' => "Admin Menu"]); ?>
    <div class="admin users listingsShow">
        <div class="container">

            <a href="/admin">Înapoi</a>
            <h1>Info despre <?php echo $listingData->getName(); ?> </h1><a href="/admin/listings/edit/<?php echo $listingData->getId(); ?>">Modifica</a>
            <hr>

            <p>User:</p>
            <p><b><?php echo $listingData->getUser()['first_name'] . ' ' . $listingData->getUser()['last_name'] . ' ( ' . $listingData->getUserId() . ' )';?></b></p>

            <br>

            <p>Location:</p>
            <p><b><?php echo $listingData->getLocation(); ?></b></p>

            <br>

            <p>Pricing:</p>
            <p><b><?php echo $listingData->getPricing();?></b></p>

            <br>

            <p>Creat pe:</p>
            <p><b><?php echo $listingData->getCreatedAt(); ?></b></p>

            <br>

            <p>Modificat La:</p>
            <p><b><?php echo $listingData->getUpdatedAt(); ?></b></p>

        </div>
    </div>
<?php echo view('templates/footer'); ?>