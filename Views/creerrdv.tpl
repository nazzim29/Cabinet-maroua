<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product - Dashboard Admin Template</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="\public/css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="\public/jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="\public/css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="\public/css/tooplate.css">
</head>

<body class="bg02">
    <div class="container">
        <div class="row">
            <div class="col-12">
                {include "./components/navbar.tpl"}
            </div>
        </div>
        <!-- row -->
        <div class="row tm-mt-big">
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">creer un Rendez-vousw</h2>
                        </div>
                    </div>
                    <form method="POST" action="\rendez-vous{if isset($rdv)}/{$rdv->id}{/if}">
                        <div class="row mt-4 tm-edit-product-row">
                            <div class="col-xl-7 col-lg-7 col-md-12">
                                <form action="" class="tm-edit-product-form">
                                    {if $_SESSION['currentUser']->role == 'medecin'}
                                        <div class="input-group mb-3">
                                            <label for="name"
                                                class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Patient
                                            </label>
                                            <select style="height: fit-content;" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                                name="patient">
                                                <option></option>
                                                {foreach from=$patients item=patient}
                                                    <option value="{$patient->ID_patient}"
                                                        {if isset($rdv) && $rdv->patient->id == $patient->ID_patient} selected
                                                        {/if}>{$patient->nom} {$patient->prenom}</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                    {/if}
                                    <div class="input-group mb-3">
                                        <label class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Date</label>
                                        <input type="datetime-local"
                                            class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                            name="date" value="{if isset($rdv)}{$rdv->date->format('Y-m-d\TH:i')}{/if}">
                                    </div>
                                    {if $_SESSION['currentUser']->role == 'medecin'}
                                        <div class="input-group mb-3">
                                            <label class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Note</label>
                                            <textarea class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                                name="observation">{if isset($rdv)}{$rdv->observation}{/if}</textarea>
                                        </div>
                                    {/if}
                                    <div class="input-group mb-3">
                                        <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                            <button type="submit" class="btn btn-primary" name="add">
                                                {if isset($patient)}Enregistrer{else}Créer{/if}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                </div>
                </form>
            </div>
        </div>
        <footer class="row tm-mt-big">
        </footer>
    </div>

    <script src="\public/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="\public/jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="\public/js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function() {
            $('#expire_date').datepicker();
        });
    </script>
</body>

</html>