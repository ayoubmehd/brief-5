<main class="mt-4">
    <h1 class="text-center mb-4">Gestion des groups</h1>

    <div class="">
        <div class="mb-3">
            <!-- Start Form -->
            <form id="addForm" action="<?php echo BASE_URL ?>/groupe/add_group" method="POST" class="form-inline">
                <div class="form-group ml-2">
                    <label for="libelle">libelle</label>
                    <input type="text" class="form-control ml-2" name="libelle" id="libelle" placeholder="Libelle">
                </div>
                <div class="form-group ml-2">
                    <label for="effectif">Effectif</label>
                    <input type="number" class="form-control ml-2" name="effectif" id="effectif" placeholder="Effectif">
                </div>
                <div class="form-group ml-2">
                    <button class="btn btn-success" name="add">Save</button>
                </div>
            </form>
        </div>
        <div class="d-flex">
            <form id="editForm" action="<?php echo BASE_URL ?>/groupe/edit_group/%id%" method="post"></form>
            <table class="table">
                <thead class="thead-inverse">
                    <tr>
                        <th>#ID</th>
                        <th>Libelle</th>
                        <th>Effectif</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <?php // foreach ($data as $key => $value) : 
                    ?>
                    <tr>
                        <td scope="row"><?php // echo $value["id"] 
                                        ?></td>
                        <td><?php // echo $value["libelle"] 
                            ?></td>
                        <td><?php // echo $value["effectif"] 
                            ?></td>
                        <td>
                            <a href="<?php // echo BASE_URL 
                                        ?>/groupe/edit_group/<?php // echo $value["id"] 
                                                                ?>" type="button" class="btn btn-success edit-button">
                                Edit
                            </a>
                            <a href="<?php // echo BASE_URL 
                                        ?>/groupe/delete_group/<?php // echo $value["id"] 
                                                                ?>" type="button" class="btn btn-danger">
                                Remove
                            </a>
                        </td>
                    </tr>
                    <?php // endforeach; 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        const endpoint = "group_all";
        const filds = ["libelle", "effectif"];
        const edit_endpoint = "groupe/edit_group",
            delete_endpoint = "groupe/delete_group";
    </script>
    <script src="<?php echo BASE_URL ?>/assets/js/fetch.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/js/edit.js"></script>
</main>