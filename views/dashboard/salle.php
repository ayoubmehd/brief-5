<main class="mt-4">
    <h1 class="text-center mb-4">Gestion des Salles</h1>

    <div class="row">
        <div class="col-md-6">
            <!-- Start Form -->
            <form id="addForm" action="<?php echo BASE_URL ?>/api/add_salle" method="POST" class="form">
                <div class="form-group">
                    <label for="libelle">Libelle</label>
                    <input type="text" class="form-control" name="libelle" id="libelle" aria-describedby="emailHelpId" placeholder="Libelle">
                </div>
                <div class="form-group">
                    <label for="capacite">Capacite</label>
                    <input type="number" class="form-control" name="capacite" id="capacite" aria-describedby="emailHelpId" placeholder="Capacite">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" name="add">Save</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <form id="editForm" action="<?php echo BASE_URL ?>/api/edit_salle/%id%" method="post"></form>
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>#ID</th>
                        <th>Salle label</th>
                        <th>Salle capacite</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <?php foreach ($data as $key => $value) : ?>
                        <tr>
                            <td scope="row"><?php echo $value["id"] ?></td>
                            <td><?php echo $value["libelle"] ?></td>
                            <td><?php echo $value["capacite"] ?></td>
                            <td>
                                <a href="<?php echo BASE_URL ?>/api/edit_salle/<?php echo $value["id"] ?>" type="button" class="btn btn-success edit-button">
                                    Edit
                                </a>
                                <a href="<?php echo BASE_URL ?>/api/delete_salle/<?php echo $value["id"] ?>" type="button" class="btn btn-danger">
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
        const endpoint = "salle_all";
        const filds = ["libelle", "capacite"];
    </script>
    <script src="<?php echo BASE_URL ?>/assets/js/fetch.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/js/edit.js"></script>
    <script>
    </script>
</main>