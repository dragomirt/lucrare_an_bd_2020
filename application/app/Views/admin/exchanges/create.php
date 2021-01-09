<?php echo view('templates/header', ['title' => "Admin Menu"]); ?>
    <div class="admin users exchangesCreate">
        <div class="container">

            <a href="/admin">Înapoi</a>
            <h1>Creeaza Transactia</h1>

            <?php if (isset($error)): ?>
                <p style="text-align: center"><?php echo $error; ?></p>
            <?php endif; ?>

            <?php $issetExchange = isset($entityData); ?>
            <form action="<?php echo $issetExchange ? '/admin/exchanges/edit': '/admin/exchanges/create'; ?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $issetExchange ? $entityData->getId() : ''; ?>">

                <label for="name">Identificatorul Ofertei 1</label>
                <input type="number" name="listing_id1" value="<?php echo $issetExchange ? $entityData->getListingId1() : ''; ?>">

                <label for="name">Identificatorul Ofertei 2</label>
                <input type="number" name="listing_id2" value="<?php echo $issetExchange ? $entityData->getListingId2() : ''; ?>">

                <label for="name">Profit</label>
                <input type="number" name="profit" value="<?php echo $issetExchange ? $entityData->getProfit() : ''; ?>">

                <input type="submit" value="<?php echo $issetExchange ? 'Actualizeaza!' : 'Creeaza!'; ?>">
            </form>


        </div>
    </div>
<?php echo view('templates/footer'); ?>