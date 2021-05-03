<main class="mt-4">
    <h1 class="text-center mb-4">Gestion des Suivers</h1>

    <div class="d-flex justify-content-center align-items-center flex-column">
        <div class="w-50">
            <a name="" id="" class="btn btn-secondary mb-4" href="<?php BASE_URL ?>/dashboard/add_suiver" role="button">Ajouter suiver</a>
        </div>
        <div class="w-80">
            <form id="editForm" action="<?php echo BASE_URL ?>/api/edit_suiver/%id%" method="post"></form>
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>#ID</th>
                        <th>Ensegniant</th>
                        <th>Groupe</th>
                        <th>Salle</th>
                        <th>jour</th>
                        <th>de</th>
                        <th>a</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <?php foreach ($data as $key => $value) : ?>
                        <tr>
                            <td scope="row"><?php echo $value["id"] ?></td>
                            <td><?php echo $value["Ensegniant_id"] ?></td>
                            <td><?php echo $value["Groupe_id"] ?></td>
                            <td><?php echo $value["Salle_id"] ?></td>
                            <td><?php echo $value["jour"] ?></td>
                            <td><?php echo $value["de"] ?></td>
                            <td><?php echo $value["a"] ?></td>
                            <td>
                                <a href="<?php echo BASE_URL ?>/api/edit_suiver/<?php echo $value["id"] ?>" type="button" class="btn btn-success edit-button">
                                    Edit
                                </a>
                                <a href="<?php echo BASE_URL ?>/api/delete_suiver/<?php echo $value["id"] ?>" type="button" class="btn btn-danger">
                                    Remove
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        const endpoint = "suiver_all";
        const filds = [
            "Ensegniant_id",
            "Groupe_id",
            "Salle_id",
            "jour",
            "de",
            "a"
        ];
    </script>
    <script src="<?php echo BASE_URL ?>/assets/js/fetch.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/js/suiver.js"></script>
</main>