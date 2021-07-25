<!DOCTYPE html>
<html lang="en">
<style>
    button {
        border-radius: 20px;
        border: 1px solid #148f8a;
        background-color: #148f8a;
        color: #FFFFFF;
        font-size: 12px;
        font-weight: bold;
        padding: 12px 45px;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: transform 80ms ease-in;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products Page - Dashboard Template</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="\public/css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="\public/css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="\public/css/tooplate.css">
</head>

<body id="reportsPage" class="bg02">
    <div class="" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {include "./components/navbar.tpl"}


                </div>

            </div>
            <div class="tm-col tm-col-medium" style="margin-top:5%">

                <div class="bg-white tm-block">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link">{$patient->nom}
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link">{$patient->prenom}</a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link">{$patient->age}</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link">{$patient->taille}cm</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link">{$patient->poids}Kg</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link">{$patient->numero_de_telephone}</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link">{$patient->adresse_mail}</a>
                        </li>


                    </ul>
                </div>
            </div>
            <!-- row -->
            <div class="row tm-content-row tm-mt-big">
                <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block">Suivi médicament</h2>

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col">La dose</th>
                                        <th scope="col" class="text-center">Date début </th>
                                        <th scope="col" class="text-center">Date fin </th>
                                        <th scope="col" class="text-center">Prise jour</th>
                                        <th scope="col" class="text-center">avant/apres</th>


                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {if isset($prescriptions) && $prescriptions}
                                        {foreach from=$prescriptions item=prescription}
                                            <tr>
                                                <td>{$prescription->dose}</td>
                                                <td>{$prescription->date_fin->format('d/m/Y')}</td>
                                                <td>{$prescription->date_debut->format('d/m/Y')}</td>
                                                <td>{$prescription->prise_jour}</td>
                                                <td>{$prescription->avant_apres}</td>
                                            </tr>
                                        {/foreach}
                                    {/if}

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <div class="tm-col tm-col-medium">
                    <div class="bg-white tm-block">
                        <h2 class="tm-block-title">Rapport</h2>
                        <table class="table table-hover table-striped tm-table-striped-even mt-3">
                            <thead>
                                <tr class="tm-bg-gray">

                                    <th scope="col">Date </th>
                                    <th scope="col" class="text-center">Observation </th>

                                </tr>
                            </thead>
                            <tbody>
                                {if isset($rdvs) && $rdvs}
                                    {foreach from=$rdvs item=rdv}
                                        <tr>
                                            <td>{$rdv->date->format('d/m/Y')}</td>
                                            <td>{$rdv->observation}</td>
                                        </tr>
                                    {/foreach}

                                {/if}

                            </tbody>
                        </table>
                        <div class="custom-file mt-3 mb-3">
                            <button name="Exporter" onclick="window.location.href =  '\\patient/{$patient->id}/rapport'">Extraire en PDF</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script src="\public/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="\public/js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function() {
            $('.tm-product-name').on('click', function() {
                window.location.href = "edit-product.html";
            });
        })
    </script>
</body>

</html>