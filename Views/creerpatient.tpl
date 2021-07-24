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
                            <h2 class="tm-block-title d-inline-block">{if isset($patient)}Modifier{else}Créer{/if} un patient</h2>
                        </div>
                    </div>
                            <form method="POST" action="\patient{if isset($patient)}/{$patient->id}{/if}">
                        <div class="row mt-4 tm-edit-product-row">
                            <div class="col-xl-7 col-lg-7 col-md-12">
                                <form action="" class="tm-edit-product-form">
                                    <div class="input-group mb-3">
                                        <label for="name" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Nom
                                        </label>
                                        <input id="nom" type="text"
                                            class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                            name="nom" {if isset($patient)}value="{$patient->nom}"{/if}>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="prenom"
                                            class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Prenom
                                        </label>
                                        <input id="prenom" type="text"
                                            class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                            name="prenom" {if isset($patient)}value="{$patient->prenom}"{/if}>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="age" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Age
                                        </label>
                                        <input id="age" type="text"
                                            class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                            name="age" {if isset($patient)}value="{$patient->age}"{/if}>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="taille"
                                            class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Taille
                                        </label>
                                        <input id="taille" type="number"
                                            class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                            name="taille" {if isset($patient)}value="{$patient->taille}"{/if}>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="poids"
                                            class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Poids
                                        </label>
                                        <input id="poids" type="number" step="0.1"
                                            class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                            name="poids" {if isset($patient)}value="{$patient->poids}"{/if}>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="numero_de_telephone"
                                            class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Telephone
                                        </label>
                                        <input id="numero_de_telephone" type="text"
                                            class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                            name="numero_de_telephone" {if isset($patient)}value="{$patient->numero_de_telephone}"{/if}>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="note"
                                            class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Note
                                        </label>
                                        <textarea id="note"
                                            class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                            name="note">{if isset($patient)}{$patient->note}{/if}</textarea>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="adresse_mail"
                                            class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Adresse Email
                                        </label>
                                        <input id="adresse_mail" type="email"
                                            class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                            name="adresse_mail" {if isset($patient)}value="{$patient->adresse_mail}"{/if}>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="mot_de_passe"
                                            class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Mot de Passe
                                        </label>
                                        <input id="mot_de_passe" type="password"
                                            class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                            name="mot_de_passe">
                                    </div>


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