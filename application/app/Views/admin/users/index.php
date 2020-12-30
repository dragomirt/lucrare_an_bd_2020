<?php echo view('templates/header', ['title' => "Admin Menu"]); ?>
    <div class="admin users">
        <div class="container">

            <a href="/admin">Înapoi</a>
            <h1>Utilizatori <a href="/admin/users/create">+</a></h1>

            <?php if (isset($createResponse)): ?>
                <p style="text-align: center"><?php echo $createResponse; ?></p>
            <?php endif; ?>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Bio</th>
                    <th>Data Creatiei</th>
                </tr>

                <?php if (isset($allEntries)): ?>
                    <?php foreach($allEntries as $entry): $entry = (object) $entry;?>
                        <tr onclick="window.location.href='/admin/users/<?php echo $entry->id; ?>'">
                            <td><?php echo $entry->id; ?></td>
                            <td><?php echo $entry->email; ?></td>
                            <td><?php echo $entry->first_name . " " . $entry->last_name; ?></td>
                            <td><?php echo $entry->phone; ?></td>
                            <td><?php echo $entry->bio; ?></td>
                            <td><?php echo $entry->created_at; ?></td>
                        </tr>
                    <?php endforeach;?>
                <?php endif;?>

            </table>


        </div>
    </div>
<?php echo view('templates/footer'); ?>