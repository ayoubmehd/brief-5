<div class="container-fluid pl-0">

    <div class="row">
        <div class="col-md-3">
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark flex-column">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
                <div class="collapse navbar-collapse flex-column align-self-start w-100" id="collapsibleNavId">
                    <ul class="nav nav-tabs flex-column w-100" style="height: 100vh;">
                        <?php if ($this->isAdmin()) : ?>
                            <li class="nav-item">
                                <a href="/dashboard/group" class="nav-link text-white">Group</a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/matiere" class="nav-link text-white">Matiere</a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/salle" class="nav-link text-white">Salle</a>
                            </li>
                        <?php endif ?>
                        <li class="nav-item">
                            <a href="/dashboard/suiver" class="nav-link text-white">Reservations</a>
                        </li>

                    </ul>
                </div>
            </nav>

        </div>