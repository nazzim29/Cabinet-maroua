<?php
/* Smarty version 3.1.39, created on 2021-07-25 16:42:28
  from 'C:\Users\Nazim\Desktop\Cabinet-maroua\Views\rdv.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60fd94749638d3_61825135',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '826d5928fddc212b842b79b83a92f2787f2ff7e5' => 
    array (
      0 => 'C:\\Users\\Nazim\\Desktop\\Cabinet-maroua\\Views\\rdv.tpl',
      1 => 1627231338,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./components/navbar.tpl' => 1,
  ),
),false)) {
function content_60fd94749638d3_61825135 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
                    <?php $_smarty_tpl->_subTemplateRender('file:./components/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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
                                    value="<?php if ((isset($_smarty_tpl->tpl_vars['date']->value))) {
echo $_smarty_tpl->tpl_vars['date']->value->format('Y-m-d');
}?>">

                            </form>
                        </div>
                        <?php if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['error']->value, 'e');
$_smarty_tpl->tpl_vars['e']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['e']->value) {
$_smarty_tpl->tpl_vars['e']->do_else = false;
?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $_smarty_tpl->tpl_vars['e']->value;?>

                                </div>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php }?>
                        <?php if ((isset($_smarty_tpl->tpl_vars['success']->value))) {?>

                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['success']->value, 's');
$_smarty_tpl->tpl_vars['s']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->do_else = false;
?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $_smarty_tpl->tpl_vars['s']->value;?>

                                </div>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php }?>
                        <div class="mt-3 row table-responsive">
                            <?php if ((isset($_smarty_tpl->tpl_vars['rdv']->value)) && $_smarty_tpl->tpl_vars['rdv']->value) {?>
                                <ul>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rdv']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
                                        <li>
                                            <span><?php echo $_smarty_tpl->tpl_vars['r']->value->date->format("H:i");?>
</span>
                                            <span><?php echo $_smarty_tpl->tpl_vars['r']->value->patient->nom;?>
 <?php echo $_smarty_tpl->tpl_vars['r']->value->patient->prenom;?>
</span>
                                            <?php if ($_smarty_tpl->tpl_vars['r']->value->patient->id == $_smarty_tpl->tpl_vars['_SESSION']->value['currentUser']->id || $_smarty_tpl->tpl_vars['_SESSION']->value['currentUser']->role == 'medecin') {?>
                                                <span class="delete fas fa-trash-alt tm-trash-icon"
                                                    data-targget="<?php echo $_smarty_tpl->tpl_vars['r']->value->ID_rendezvous;?>
"></span>
                                            <?php }?>
                                            <?php if (intval($_smarty_tpl->tpl_vars['r']->value->valider_medecin) == 0 && $_smarty_tpl->tpl_vars['_SESSION']->value['currentUser']->role == 'medecin') {?>
                                                <a class="fas fa-trash-alt tm-trash-icon"
                                                    href="\rendez-vous/modifier/<?php echo $_smarty_tpl->tpl_vars['r']->value->ID_rendezvous;?>
"> edit</a>
                                                <a class="fas fa-trash-alt tm-trash-icon"
                                                    href="\rendez-vous/valider/<?php echo $_smarty_tpl->tpl_vars['r']->value->ID_rendezvous;?>
">valider</a>
                                            <?php }?>

                                        </li>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </ul>
                            <?php } else { ?>
                                aucun rendez-vous pour aujourd'hui
                            <?php }?>
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
            <?php echo '</script'; ?>
>
</body>

</html><?php }
}
