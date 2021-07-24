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
                            <h2 class="tm-block-title d-inline-block">{if isset($prescription)}Modifier{else}Créer{/if} un prescription</h2>
                        </div>
                    </div>
                            <form method="POST" action="\prescription{if isset($prescription)}/{$prescription->ID_medicament}_{$prescription->id}{/if}">
                        <div class="row mt-4 tm-edit-product-row">
                            <div class="col-xl-7 col-lg-7 col-md-12">
                                <form action="" class="tm-edit-product-form">
                                    <div class="input-group mb-3">
                                        <label for="name" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Patient
                                        </label>
                                        <select class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" style="height: fit-content;"
                                            name="patient">
                                                <option></option>
                                                {foreach from=$patients item=patient}
                                                <option value="{$patient->ID_patient}" {if isset($prescription)&& $prescription->id == $patient->ID_patient}selected{/if} >{$patient->nom|upper} {$patient->prenom|capitalize}</option>
                                                {/foreach}
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="prenom"
                                            class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Medicament
                                        </label>
                                        <select class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" style="height: fit-content;"
                                            name="medicament" >
                                                <option></option>
                                                {foreach from=$medicaments item=medicament}
                                                    <option value="{$medicament->ID_medicament}" {if isset($prescription)&& $prescription->ID_medicament == $medicament->ID_medicament}selected{/if}>{$medicament->nom}</option>
                                                {/foreach}
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="age" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Dosage
                                        </label>
                                        <input type="number"
                                            class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                            name="dose" {if isset($prescription)}value="{$prescription->dose}"{/if}>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="taille"
                                            class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Date debut
                                        </label>
                                        <input id="taille" type="date"
                                            class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                            name="date_debut" {if isset($prescription)}value="{$prescription->date_debut->format('Y-m-d')}"{/if}>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="poids"
                                            class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Date fin
                                        </label>
                                        <input type="date"
                                            class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                            name="date_fin" {if isset($prescription)}value="{$prescription->date_fin->format('Y-m-d')}"{/if}>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="numero_de_telephone"
                                            class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Prise par jour
                                        </label>
                                        <input type="number"
                                            class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                            name="prise_jour"{if isset($prescription)}value="{$prescription->prise_jour}"{/if}>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="note"
                                            class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">quand
                                        </label>
                                        <select class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" style="height: fit-content;"
                                            name="quand" >
                                            <option></option>
                                            <option value="avant_repas"{if isset($prescription) && $prescription->avant_apres == "avant_repas"} selected{/if}>Avant</option>
                                            <option value="pendant_repas" {if isset($prescription) && $prescription->avant_apres == "pendant_repas"} selected{/if}>Pendant</option>
                                            <option value="apres_repas" {if isset($prescription) && $prescription->avant_apres == "apres_repas"} selected{/if}>Apres</option>
                                        </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                            <button type="submit" class="btn btn-primary" name="add">
                                                {if isset($prescription)}Enregistrer{else}Créer{/if}
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