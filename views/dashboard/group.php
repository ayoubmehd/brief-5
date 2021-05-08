<main class="mt-4">
    <h1 class="text-center mb-4">Gestion des groups</h1>

    <div class="row">
        <div class="col-md-6">
            <!-- Start Form -->
            <form id="addForm" action="<?php echo BASE_URL ?>/api/add_group" method="POST" class="form">
                <div class="form-group">
                    <label for="libelle">libelle</label>
                    <input type="text" class="form-control" name="libelle" id="libelle" placeholder="Libelle">
                </div>
                <div class="form-group">
                    <label for="effectif">Effectif</label>
                    <input type="number" class="form-control" name="effectif" id="effectif" placeholder="Effectif">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" name="add">Save</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <form id="editForm" action="<?php echo BASE_URL ?>/api/edit_group/%id%" method="post"></form>
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>#ID</th>
                        <th>Libelle</th>
                        <th>Effectif</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <?php foreach ($data as $key => $value) : ?>
                        <tr>
                            <td scope="row"><?php echo $value["id"] ?></td>
                            <td><?php echo $value["libelle"] ?></td>
                            <td><?php echo $value["effectif"] ?></td>
                            <td>
                                <a href="<?php echo BASE_URL ?>/api/edit_group/<?php echo $value["id"] ?>" type="button" class="btn btn-success edit-button">
                                    Edit
                                </a>
                                <a href="<?php echo BASE_URL ?>/api/delete_group/<?php echo $value["id"] ?>" type="button" class="btn btn-danger">
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
        const endpoint = "group_all";
        const filds = ["libelle", "effectif"];
    </script>
    <script src="<?php echo BASE_URL ?>/assets/js/fetch.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/js/edit.js"></script>
</main>