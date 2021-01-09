<?php echo view('templates/header', ['title' => "Admin Menu"]); ?>
    <div class="admin users">
        <div class="container">

            <a href="/admin">Înapoi</a>
            <h1>Transactii <a href="/admin/exchanges/create">+</a></h1>

            <?php if (isset($createResponse)): ?>
                <p style="text-align: center"><?php echo $createResponse; ?></p>
            <?php endif; ?>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Listing Id 1</th>
                    <th>Listing Id 2</th>
                    <th>Profit</th>
                    <th>Creat</th>
                    <th>Actualizat</th>
                </tr>

                <?php if (isset($allEntries)): ?>
                    <?php foreach($allEntries as $entry): $entry = (object) $entry;?>
                            <tr >
                                <td><a href="/admin/exchanges/<?php echo $entry->getId(); ?>"><?php echo $entry->getId(); ?></a></td>
                                <td><a href="/admin/listings/<?php echo $entry->getListingId1(); ?>"><?php echo $entry->getListingId1(); ?></a></td>
                                <td><a href="/admin/listings/<?php echo $entry->getListingId2(); ?>"><?php echo $entry->getListingId2();?></a></td>
                                <td><?php echo $entry->getProfit(); ?></td>
                                <td><?php echo $entry->getCreatedAt(); ?></td>
                                <td><?php echo $entry->getUpdatedAt(); ?></td>
                                <td><a href="/admin/exchanges/remove/<?php echo $entry->getId(); ?>">X</a></td>
                            </tr>

                    <?php endforeach;?>
                <?php endif;?>

            </table>


        </div>
    </div>
<?php echo view('templates/footer'); ?>