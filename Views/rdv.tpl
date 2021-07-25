<!DOCTYPE html>
<html lang="en">

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
                    {include './components/navbar.tpl'}
                </div>
            </div>
            <!-- row -->
            <div class="row tm-content-row tm-mt-big">
                <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block">Calendrier de rendez-vous</h2>

                            </div>
                            <div class="col-md-4 col-sm-12 text-right">
                                <a href="\rendez-vous/creer" class="btn btn-small btn-primary">Créer un rendez-vous</a>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <form>
                                <input type="date" name="date" onchange="$(event.target.parentNode).submit()"
                                    value="{if isset($date)}{$date->format('Y-m-d')}{/if}">

                            </form>
                        </div>
                        {if isset($error)}
                            {foreach from=$error item=e}
                                <div class="alert alert-danger" role="alert">
                                    {$e}
                                </div>
                            {/foreach}
                        {/if}
                        {if isset($success)}

                            {foreach from=$success item=s}
                                <div class="alert alert-success" role="alert">
                                    {$s}
                                </div>
                            {/foreach}
                        {/if}
                        <div class="mt-3 row table-responsive">
                            {if isset($rdv)&&$rdv}
                                <ul>
                                    {foreach from=$rdv item=r}
                                        <li>
                                            <span>{$r->date->format("H:i")}</span>
                                            <span>{$r->patient->nom} {$r->patient->prenom}</span>
                                            {if $r->patient->id == $_SESSION['currentUser']->id || $_SESSION['currentUser']->role == 'medecin'}
                                                <span class="delete fas fa-trash-alt tm-trash-icon"
                                                    data-targget="{$r->ID_rendezvous}"></span>
                                            {/if}
                                            {if intval($r->valider_medecin) == 0 and $_SESSION['currentUser']->role == 'medecin'}
                                                <a class="fas fa-trash-alt tm-trash-icon"
                                                    href="\rendez-vous/modifier/{$r->ID_rendezvous}"> edit</a>
                                                <a class="fas fa-trash-alt tm-trash-icon"
                                                    href="\rendez-vous/valider/{$r->ID_rendezvous}">valider</a>
                                            {/if}

                                        </li>
                                    {/foreach}
                                </ul>
                            {else}
                                aucun rendez-vous pour aujourd'hui
                            {/if}
                        </div>
                    </div>
                </div>


            </div>
            <script src="\public/js/jquery-3.3.1.min.js"></script>
            <!-- https://jquery.com/download/ -->
            <script src="\public/js/bootstrap.min.js"></script>
            <!-- https://getbootstrap.com/ -->
            <script>
                $('.delete').on('click', function(e) {
                    let id = $(e.target).data().targget

                    let xhr = new XMLHttpRequest()
                    xhr.open('delete', '\\rendez-vous/' + id)
                    xhr.onload = () => {
                        window.location.reload()
                    }
                    xhr.send()
                })
                $(function() {
                    $('.tm-product-name').on('click', function() {
                        window.location.href = "edit-product.html";
                    });
                })
            </script>
</body>

</html>