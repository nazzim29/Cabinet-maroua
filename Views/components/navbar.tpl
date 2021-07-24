<nav class="navbar navbar-expand-xl navbar-light bg-light">
                        <a class="navbar-brand">
                            <i class="fas fa-3x  ">
                                <img src="\public/img/logo02.png" alt="" style="height: 100px;" /></i>
                            <h1 class="tm-site-title mb-0">Docteur Houaoui</h1>
                        </a>
                        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="/rendez-vous">Rendez-vous
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/prescription">Prescription
                                    </a>
                                </li>
                                {if $_SESSION['currentUser']->role == 'medecin'}
                                <li class="nav-item active ">
                                    <a class="nav-link" href="/patient">Patient</a>
                                </li>
                                {/if}
                                {if $_SESSION['currentUser']->role == 'medecin'}
                                <li class="nav-item">
                                    <a class="nav-link" href="/medicament">medicament</a>
                                </li>
                                {/if}
                            </ul>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link d-flex" href="/logout">
                                        <i class="far fa-user mr-2 tm-logout-icon"></i>
                                        <span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>