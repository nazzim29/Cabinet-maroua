<?php
/* Smarty version 3.1.39, created on 2021-07-25 14:55:51
  from 'C:\Users\Nazim\Desktop\Cabinet-maroua\Views\profilpatient.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60fd7b77869d77_67360511',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c24210bb8367d2431d7f6361f058e884ee652927' => 
    array (
      0 => 'C:\\Users\\Nazim\\Desktop\\Cabinet-maroua\\Views\\profilpatient.tpl',
      1 => 1627224945,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./components/navbar.tpl' => 1,
  ),
),false)) {
function content_60fd7b77869d77_67360511 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
                    <?php $_smarty_tpl->_subTemplateRender("file:./components/navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


                </div>

            </div>
            <div class="tm-col tm-col-medium" style="margin-top:5%">

                <div class="bg-white tm-block">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link"><?php echo $_smarty_tpl->tpl_vars['patient']->value->nom;?>

                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"><?php echo $_smarty_tpl->tpl_vars['patient']->value->prenom;?>
</a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link"><?php echo $_smarty_tpl->tpl_vars['patient']->value->age;?>
</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link"><?php echo $_smarty_tpl->tpl_vars['patient']->value->taille;?>
cm</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link"><?php echo $_smarty_tpl->tpl_vars['patient']->value->poids;?>
Kg</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link"><?php echo $_smarty_tpl->tpl_vars['patient']->value->numero_de_telephone;?>
</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link"><?php echo $_smarty_tpl->tpl_vars['patient']->value->adresse_mail;?>
</a>
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
                                    <?php if ((isset($_smarty_tpl->tpl_vars['prescriptions']->value)) && $_smarty_tpl->tpl_vars['prescriptions']->value) {?>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['prescriptions']->value, 'prescription');
$_smarty_tpl->tpl_vars['prescription']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['prescription']->value) {
$_smarty_tpl->tpl_vars['prescription']->do_else = false;
?>
                                            <tr>
                                                <td><?php echo $_smarty_tpl->tpl_vars['prescription']->value->dose;?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['prescription']->value->date_fin->format('d/m/Y');?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['prescription']->value->date_debut->format('d/m/Y');?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['prescription']->value->prise_jour;?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['prescription']->value->avant_apres;?>
</td>
                                            </tr>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    <?php }?>

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
                                <?php if ((isset($_smarty_tpl->tpl_vars['rdvs']->value)) && $_smarty_tpl->tpl_vars['rdvs']->value) {?>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rdvs']->value, 'rdv');
$_smarty_tpl->tpl_vars['rdv']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['rdv']->value) {
$_smarty_tpl->tpl_vars['rdv']->do_else = false;
?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['rdv']->value->date->format('d/m/Y');?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['rdv']->value->observation;?>
</td>
                                        </tr>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                <?php }?>

                            </tbody>
                        </table>
                        <div class="custom-file mt-3 mb-3">
                            <button name="Exporter" onclick="window.location.href =  '\\patient/<?php echo $_smarty_tpl->tpl_vars['patient']->value->id;?>
/rapport'">Extraire en PDF</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <?php echo '<script'; ?>
 src="\public/js/jquery-3.3.1.min.js"><?php echo '</script'; ?>
>
    <!-- https://jquery.com/download/ -->
    <?php echo '<script'; ?>
 src="\public/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <!-- https://getbootstrap.com/ -->
    <?php echo '<script'; ?>
>
        $(function() {
            $('.tm-product-name').on('click', function() {
                window.location.href = "edit-product.html";
            });
        })
    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
