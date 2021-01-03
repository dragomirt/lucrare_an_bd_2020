<?php echo view('templates/header', ['title' => "Admin Menu"]); ?>
    <div class="admin users">
        <div class="container">

            <a href="/admin">Înapoi</a>
            <h1>Optiuni disponibile <a href="/admin/option_types/create">+</a></h1>

            <?php if (isset($createResponse)): ?>
                <p style="text-align: center"><?php echo $createResponse; ?></p>
            <?php endif; ?>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Remove</th>
                </tr>

                <?php if (isset($allEntries)): ?>
                    <?php foreach($allEntries as $entry): $entry = (object) $entry;?>
                        <tr onclick="window.location.href='/admin/option_tyoes/<?php echo $entry->id; ?>'">
                            <td><?php echo $entry->id; ?></td>
                            <td><?php echo $entry->name; ?></td>
                            <td><a href="/admin/option_types/remove/<?php echo $entry->id; ?>">X</a></td>
                        </tr>
                    <?php endforeach;?>
                <?php endif;?>

            </table>


        </div>
    </div>
<?php echo view('templates/footer'); ?>