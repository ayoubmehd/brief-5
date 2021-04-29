<main class="mt-4">
    <div class="row justify-content-center" style="height: 100vh;">
        <div class="col-md-4">
            <div class="card text-left">
                <?php
                // echo "<pre>";
                // var_dump($data);
                // echo "</pre>";
                ?>

                <div class="card-header">
                    Ensegniant profile setting
                </div>
                <div class="card-body">
                    <form action="<?php echo BASE_URL ?>/ensegniant" method="POST">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="<?php echo isset($data[0]["nom"]) ? $data[0]["nom"] : "" ?>" placeholder="Nom">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prenom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo isset($data[0]["prenom"]) ? $data[0]["prenom"] : "" ?>" placeholder="Prenom">
                        </div>
                        <div class="form-group">
                            <label for="matiere">Matiere</label>
                            <select type="text" class="form-control" id="matiere" name="matiere">
                                <option value="-1" disabled>Matiere</option>
                                <?php foreach ($matiere as $value) : ?>
                                    <option value="<?php echo $value["id"] ?>" <?php echo isset($data[0]["Matiere_id"]) ? (($data[0]["Matiere_id"] === $value["id"]) ? "selected" : "") : "" ?>>
                                        <?php echo $value["Matiere_label"] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button name="register" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>