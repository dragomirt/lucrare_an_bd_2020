<?php echo view('templates/header', ['title' => "Admin Menu"]); ?>
    <div class="admin users exchangesShow">
        <div class="container">

            <a href="/admin">Înapoi</a>
            <h1>Info despre transactia <?php echo $entryData->getId(); ?> </h1><a href="/admin/exchanges/edit/<?php echo $entryData->getId(); ?>">Modifica</a>
            <hr>

            <p>Oferta 1:</p>
            <p><b><a href="/admin/listings/<?php echo $entryData->getListingId1(); ?>"><?php echo $entryData->getListingId1(); ?></a></b></p>

            <br>

            <p>Oferta 2:</p>
            <p><b><a href=/admin/listings/<?php echo $entryData->getListingId2(); ?>"><?php echo $entryData->getListingId2(); ?></a></b></p>

            <br>

            <p>Profit ($):</p>
            <p><b><?php echo $entryData->getProfit();?></b></p>

            <br>

            <p>Creat pe:</p>
            <p><b><?php echo $entryData->getCreatedAt(); ?></b></p>

            <br>

            <p>Modificat La:</p>
            <p><b><?php echo $entryData->getUpdatedAt(); ?></b></p>

        </div>
    </div>
<?php echo view('templates/footer'); ?>