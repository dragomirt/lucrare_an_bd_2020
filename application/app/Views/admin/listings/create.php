<?php echo view('templates/header', ['title' => "Admin Menu"]); ?>
    <div class="admin users listingsCreate">
        <div class="container">

            <a href="/admin">Înapoi</a>
            <h1>Creeaza Oferta</h1>

            <?php if (isset($error)): ?>
                <p style="text-align: center"><?php echo $error; ?></p>
            <?php endif; ?>

            <?php $issetListing = isset($listingData); ?>
            <form action="<?php echo $issetListing ? '/admin/listings/edit': '/admin/listings/create'; ?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $issetListing ? $listingData->getId() : ''; ?>">

                <label for="name">Denumirea Ofertei</label>
                <input type="text" name="name" value="<?php echo $issetListing ? $listingData->getName() : ''; ?>">

                <label for="name">Identificatorul utilizatorului</label>
                <input type="number" name="user_id" value="<?php echo $issetListing ? $listingData->getUserId() : ''; ?>">

                <label for="name">Adresa</label>
                <input type="text" name="location" value="<?php echo $issetListing ? $listingData->getLocation() : ''; ?>">

                <label for="name">Pretul per noapte ( $ )</label>
                <input type="number" name="pricing" value="<?php echo $issetListing ? $listingData->getPricing() : ''; ?>">


                <br><br>
                <h4>Optiuni</h4>
                <?php $optionsModel = new \App\Models\OptionTypeModel(); $allOptions = $optionsModel->findAll(); ?>
                <?php if ($allOptions):?>
                    <?php foreach ($allOptions as $option): ?>
                        <label for="" class="option"><input type="checkbox" name="option_<?php echo $option['id'];?>"><?php echo $option['name']; ?></label>
                    <?php endforeach; ?>
                <?php endif; ?>

                <br><br>
                <input type="submit" value="<?php echo $issetListing ? 'Actualizeaza!' : 'Creeaza!'; ?>">
            </form>


        </div>
    </div>
<?php echo view('templates/footer'); ?>