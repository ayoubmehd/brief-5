<main class="mt-4">
    <h1 class="text-center mb-4">Gestion des groups</h1>

    <div class="">
        <div class="mb-3">
            <!-- Start Form -->
            <form id="addForm" action="<?php echo BASE_URL ?>/api/add_group" method="POST" class="">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="libelle">libelle</label>
                        <input type="text" class="form-control" name="libelle" id="libelle" placeholder="Libelle">
                    </div>
                    <div class="form-group col">
                        <label for="effectif">Effectif</label>
                        <input type="number" class="form-control" name="effectif" id="effectif" placeholder="Effectif">
                    </div>
                </div>
                <div class="form-group d-flex justify-content-end">
                    <button class="btn btn-secondary add_inputs_button" type="button">Add</button>
                    <button class="btn btn-success ml-2" name="add">Save</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        const endpoint = "group_all";
        const filds = ["libelle", "effectif"];
        const edit_endpoint = "edit_group",
            delete_endpoint = "delete_group";
    </script>
    <script src="<?php echo BASE_URL ?>/assets/js/multi_add.js"></script>
</main>