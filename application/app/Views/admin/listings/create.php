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
                <input type="hidden" name="id" value="<?php echo $issetListing ? $listingData->id : ''; ?>">

                <label for="name">Denumirea Ofertei</label>
                <input type="text" name="name" value="<?php echo $issetListing ? $listingData->name : ''; ?>">

                <label for="name">Identificatorul utilizatorului</label>
                <input type="number" name="user_id" value="<?php echo $issetListing ? $listingData->user_id : ''; ?>">

                <label for="name">Adresa</label>
                <input type="number" name="address" value="<?php echo $issetListing ? $listingData->address : ''; ?>">

                <label for="name">Pretul per noapte ( $ )</label>
                <input type="number" name="pricing" value="<?php echo $issetListing ? $listingData->price : ''; ?>">

                <label for="name">Linkul spre imagine</label>
                <input type="text" name="image" value="<?php echo $issetListing ? $listingData->image : ''; ?>">

                <input type="submit" value="<?php echo $issetListing ? 'Actualizeaza!' : 'Creeaza!'; ?>">
            </form>


        </div>
    </div>
<?php echo view('templates/footer'); ?>