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
                                <h2 class="tm-block-title d-inline-block">Liste des prescriptions</h2>

                            </div>
                            <div class="col-md-4 col-sm-12 text-right">
                                <a href="prescription/creer" class="btn btn-small btn-primary">Prescrire un medicament</a>
                            </div>
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
                        {if $_SESSION['currentUser']->role == 'medecin'}
                        <div>
                            <form>
                                <select onchange="$(event.target.parentNode).submit()" name="patient">
                                    <option></option>
                                    {foreach from=$patients item=patient}
                                        <option value="{$patient->ID_patient}" {if isset($selectval) && $selectval == $patient->ID_patient}selected{/if}>{$patient->nom|upper} {$patient->prenom|capitalize}</option>
                                    {/foreach}
                                    
                                </select>
                            </form>
                        </div>
                        {/if}
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col" class="text-center">Medicament</th>
                                        <th scope="col" class="text-center">Dosage</th>
                                        <th scope="col" class="text-center">Debut</th>
                                        <th scope="col" class="text-center">fin</th>
                                        <th scope="col" class="text-center">Prise par jours</th>
                                        <th scope="col" class="text-center">Avant/Apres/Pendant</th>
                                        <th scope="col" class="text-center"></th>

                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {if isset($prescriptions) && $prescriptions}
                                        {foreach from=$prescriptions item=prescription}
                                            <tr>
                                                <td class="text-center">
                                                    {$prescription->medicament->nom}
                                                </td>
                                                <td class="text-center">
                                                    {$prescription->dose}
                                                </td>
                                                <td class="text-center">
                                                    {$prescription->date_debut->format('d/m/Y')}
                                                </td>
                                                <td class="text-center">
                                                    {$prescription->date_fin->format('d/m/Y')}
                                                </td>
                                                <td class="text-center">
                                                    {$prescription->prise_jour}
                                                </td>
                                                <td class="text-center">
                                                    {$prescription->avant_apres}
                                                </td>
                                                {if $_SESSION['currentUser']->role == "medecin"}
                                                <td>

                                                    <a data-targget="{$prescription->ID_medicament}_{$prescription->ID_patient}" class="delete fas fa-trash-alt tm-trash-icon"></a>
                                                </td>
                                                <td>
                                                    <a class="fas fa-pencil-alt tm-trash-icon"
                                                        href='\prescription/modifier/{$prescription->ID_medicament}_{$prescription->ID_patient}'></a>
                                                </td>
                                                {/if}
                                            </tr>
                                        {/foreach}
                                    {else}
                                        <div>Aucune prescription dans la BDD</div>
                                    {/if}
                                </tbody>
                            </table>
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
                    $('.delete').on('click', function(e) {
                        let id = $(e.target).data().targget

                        let xhr = new XMLHttpRequest()
                        xhr.open('delete','\\prescription/'+id)
                        xhr.onload=()=>{
                            window.location.reload()
                        }
                        xhr.send()
                    })
                    $('.tm-product-name').on('click', function() {
                        window.location.href = "edit-product";
                    });
                })
            </script>
</body>

</html>