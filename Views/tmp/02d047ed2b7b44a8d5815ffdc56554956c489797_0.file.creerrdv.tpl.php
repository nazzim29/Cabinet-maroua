<?php
/* Smarty version 3.1.39, created on 2021-07-24 15:47:00
  from 'C:\Users\Nazim\Desktop\Cabinet-maroua\Views\creerrdv.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60fc35f45182c0_07674215',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02d047ed2b7b44a8d5815ffdc56554956c489797' => 
    array (
      0 => 'C:\\Users\\Nazim\\Desktop\\Cabinet-maroua\\Views\\creerrdv.tpl',
      1 => 1627141618,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./components/navbar.tpl' => 1,
  ),
),false)) {
function content_60fc35f45182c0_07674215 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
                <?php $_smarty_tpl->_subTemplateRender("file:./components/navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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
                    <form method="POST" action="\rendez-vous<?php if ((isset($_smarty_tpl->tpl_vars['rdv']->value))) {?>/<?php echo $_smarty_tpl->tpl_vars['rdv']->value->id;
}?>">
                        <div class="row mt-4 tm-edit-product-row">
                            <div class="col-xl-7 col-lg-7 col-md-12">
                                <form action="" class="tm-edit-product-form">
                                    <?php if ($_smarty_tpl->tpl_vars['_SESSION']->value['currentUser']->role == 'medecin') {?>
                                        <div class="input-group mb-3">
                                            <label for="name"
                                                class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Patient
                                            </label>
                                            <select style="height: fit-content;" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                                name="patient">
                                                <option></option>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['patients']->value, 'patient');
$_smarty_tpl->tpl_vars['patient']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['patient']->value) {
$_smarty_tpl->tpl_vars['patient']->do_else = false;
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['patient']->value->ID_patient;?>
"
                                                        <?php if ((isset($_smarty_tpl->tpl_vars['rdv']->value)) && $_smarty_tpl->tpl_vars['rdv']->value->patient->id == $_smarty_tpl->tpl_vars['patient']->value->ID_patient) {?> selected
                                                        <?php }?>><?php echo $_smarty_tpl->tpl_vars['patient']->value->nom;?>
 <?php echo $_smarty_tpl->tpl_vars['patient']->value->prenom;?>
</option>
                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            </select>
                                        </div>
                                    <?php }?>
                                    <div class="input-group mb-3">
                                        <label class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Date</label>
                                        <input type="datetime-local"
                                            class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                            name="date" value="<?php if ((isset($_smarty_tpl->tpl_vars['rdv']->value))) {
echo $_smarty_tpl->tpl_vars['rdv']->value->date->format('Y-m-d\TH:i');
}?>">
                                    </div>
                                    <?php if ($_smarty_tpl->tpl_vars['_SESSION']->value['currentUser']->role == 'medecin') {?>
                                        <div class="input-group mb-3">
                                            <label class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Note</label>
                                            <textarea class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                                name="observation"><?php if ((isset($_smarty_tpl->tpl_vars['rdv']->value))) {
echo $_smarty_tpl->tpl_vars['rdv']->value->observation;
}?></textarea>
                                        </div>
                                    <?php }?>
                                    <div class="input-group mb-3">
                                        <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                            <button type="submit" class="btn btn-primary" name="add">
                                                <?php if ((isset($_smarty_tpl->tpl_vars['patient']->value))) {?>Enregistrer<?php } else { ?>Créer<?php }?>
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

    <?php echo '<script'; ?>
 src="\public/js/jquery-3.3.1.min.js"><?php echo '</script'; ?>
>
    <!-- https://jquery.com/download/ -->
    <?php echo '<script'; ?>
 src="\public/jquery-ui-datepicker/jquery-ui.min.js"><?php echo '</script'; ?>
>
    <!-- https://jqueryui.com/download/ -->
    <?php echo '<script'; ?>
 src="\public/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <!-- https://getbootstrap.com/ -->
    <?php echo '<script'; ?>
>
        $(function() {
            $('#expire_date').datepicker();
        });
    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
