<main class="mt-4">
    <h1 class="text-center mb-4">Reservations des salles</h1>

    <div class="d-flex justify-content-center align-items-center flex-column">
        <div class="w-100">
            <a name="" id="" class="btn btn-secondary mb-4" href="<?php BASE_URL ?>/dashboard/add_suiver" role="button">Reserver</a>
        </div>
        <div class="w-100">
            <form id="editForm" action="<?php echo BASE_URL ?>/suiver/edit_suiver/%id%" method="post"></form>
            <table class="table" id="table">
                <thead class="thead-inverse">
                    <tr>
                        <th>#ID</th>
                        <?php if ($this->isAdmin()) : ?>
                            <th>Ensegniant</th>
                        <?php endif; ?>
                        <th>Groupe</th>
                        <th>Salle</th>
                        <th>jour</th>
                        <th>de</th>
                        <th>a</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <?php // foreach ($data as $key => $value) : 
                    ?>
                    <tr>
                        <td scope="row"><?php // echo $value["id"] 
                                        ?></td>
                        <?php if ($this->isAdmin()) : ?>
                            <td><?php echo $value["Ensegniant_id"] ?></td>
                        <?php endif; ?>
                        <td><?php // echo $value["Groupe_id"] 
                            ?></td>
                        <td><?php // echo $value["Salle_id"] 
                            ?></td>
                        <td><?php // echo $value["jour"] 
                            ?></td>
                        <td><?php // echo $value["de"] 
                            ?></td>
                        <td><?php // echo $value["a"] 
                            ?></td>
                        <td>
                            <a href="<?php // echo BASE_URL 
                                        ?>/suiver/edit_suiver/<?php // echo $value["id"] 
                                                                ?>" class="btn btn-success edit-button">
                                Edit
                            </a>
                            <a href="<?php // echo BASE_URL 
                                        ?>/suiver/delete_suiver/<?php // echo $value["id"] 
                                                                ?>" class="btn btn-danger">
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
        const endpoint = "suiver_all";
        const filds = [

            <?php if ($this->isAdmin()) : ?> "Ensegniant_id", <?php endif ?> "Groupe_id",
            "Salle_id",
            "jour",
            "de",
            "a"
        ];
    </script>
    <script src="<?php echo BASE_URL ?>/assets/js/fetch.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/js/suiver.js"></script>
    <script>
        async function init() {
            const data = await fetchElm("suiver_all");
            displaySuiverAll(data.data, tbody);
        }

        document.addEventListener("DOMContentLoaded", init);
    </script>
</main>