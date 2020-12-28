<?php echo view('templates/header', ['title' => "Admin Menu"]); ?>
    <div class="admin requests">
        <div class="container">

            <a href="/admin">Înapoi</a>
            <h1>Aplicațiile Utilizatorilor</h1>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Data Creatiei</th>
                </tr>

                <?php if (isset($allEntries)): ?>
                    <?php foreach($allEntries as $entry): $entry = (object) $entry;?>
                        <tr>
                            <td><?php echo $entry->id; ?></td>
                            <td><?php echo $entry->email; ?></td>
                            <td><?php echo $entry->first_name . $entry->last_name; ?></td>
                            <td><?php echo $entry->phone; ?></td>
                            <td><?php echo $entry->message; ?></td>
                            <td><?php echo $entry->created_at; ?></td>
                        </tr>
                    <?php endforeach;?>
                <?php endif;?>

            </table>


        </div>
    </div>
<?php echo view('templates/footer'); ?>