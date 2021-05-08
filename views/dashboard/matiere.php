<main class="mt-4">
    <h1 class="text-center mb-4">Gestion des matieres</h1>

    <div class="row">
        <div class="col-md-4">
            <!-- Start Form -->
            <form id="addForm" action="<?php echo BASE_URL ?>/api/add_matiere" method="POST" class="form">
                <div class="form-group">
                    <label for="Matiere_label">Matiere label</label>
                    <input type="text" class="form-control" name="Matiere_label" id="Matiere_label" aria-describedby="emailHelpId" placeholder="">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" name="add">Save</button>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <form id="editForm" action="<?php echo BASE_URL ?>/api/edit_matiere/%id%" method="post"></form>
            <table class="table">
                <thead class="thead-inverse">
                    <tr>
                        <th>#ID</th>
                        <th>Matiere label</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <?php foreach ($data as $key => $value) : ?>
                        <tr>
                            <td scope="row"><?php echo $value["id"] ?></td>
                            <td><?php echo $value["Matiere_label"] ?></td>
                            <td>
                                <a href="<?php echo BASE_URL ?>/api/edit_matiere/<?php echo $value["id"] ?>" type="button" class="btn btn-success edit-button">
                                    Edit
                                </a>
                                <a href="<?php echo BASE_URL ?>/api/delete_matiere/<?php echo $value["id"] ?>" type="button" class="btn btn-danger">
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
        const endpoint = "matiere_all";
        const filds = ["Matiere_label"];
    </script>
    <script src="<?php echo BASE_URL ?>/assets/js/fetch.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/js/edit.js"></script>
    <script>
    </script>
</main>