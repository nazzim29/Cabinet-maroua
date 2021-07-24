<?php
/* Smarty version 3.1.39, created on 2021-07-24 21:08:05
  from 'C:\Users\Nazim\Desktop\Cabinet-maroua\Views\creerprescription.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60fc8135b23123_18680445',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d028a8a740f3ab28e4ce02deff11dfe8e4f8aba' => 
    array (
      0 => 'C:\\Users\\Nazim\\Desktop\\Cabinet-maroua\\Views\\creerprescription.tpl',
      1 => 1627160884,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./components/navbar.tpl' => 1,
  ),
),false)) {
function content_60fc8135b23123_18680445 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\Nazim\\Desktop\\Cabinet-maroua\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
?>
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
                            <h2 class="tm-block-title d-inline-block"><?php if ((isset($_smarty_tpl->tpl_vars['prescription']->value))) {?>Modifier<?php } else { ?>Créer<?php }?> un prescription</h2>
                        </div>
                    </div>
                            <form method="POST" action="\prescription<?php if ((isset($_smarty_tpl->tpl_vars['prescription']->value))) {?>/<?php echo $_smarty_tpl->tpl_vars['prescription']->value->ID_medicament;?>
_<?php echo $_smarty_tpl->tpl_vars['prescription']->value->id;
}?>">
                        <div class="row mt-4 tm-edit-product-row">
                            <div class="col-xl-7 col-lg-7 col-md-12">
                                <form action="" class="tm-edit-product-form">
                                    <div class="input-group mb-3">
                                        <label for="name" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Patient
                                        </label>
                                        <select class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" style="height: fit-content;"
                                            name="patient">
                                                <option></option>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['patients']->value, 'patient');
$_smarty_tpl->tpl_vars['patient']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['patient']->value) {
$_smarty_tpl->tpl_vars['patient']->do_else = false;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['patient']->value->ID_patient;?>
" <?php if ((isset($_smarty_tpl->tpl_vars['prescription']->value)) && $_smarty_tpl->tpl_vars['prescription']->value->id == $_smarty_tpl->tpl_vars['patient']->value->ID_patient) {?>selected<?php }?> ><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['patient']->value->nom, 'UTF-8');?>
 <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['patient']->value->prenom);?>
</option>
                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="prenom"
                                            class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Medicament
                                        </label>
                                        <select class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" style="height: fit-content;"
                                            name="medicament" >
                                                <option></option>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['medicaments']->value, 'medicament');
$_smarty_tpl->tpl_vars['medicament']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['medicament']->value) {
$_smarty_tpl->tpl_vars['medicament']->do_else = false;
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['medicament']->value->ID_medicament;?>
" <?php if ((isset($_smarty_tpl->tpl_vars['prescription']->value)) && $_smarty_tpl->tpl_vars['prescription']->value->ID_medicament == $_smarty_tpl->tpl_vars['medicament']->value->ID_medicament) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['medicament']->value->nom;?>
</option>
                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="age" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Dosage
                                        </label>
                                        <input type="number"
                                            class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                            name="dose" <?php if ((isset($_smarty_tpl->tpl_vars['prescription']->value))) {?>value="<?php echo $_smarty_tpl->tpl_vars['prescription']->value->dose;?>
"<?php }?>>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="taille"
                                            class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Date debut
                                        </label>
                                        <input id="taille" type="date"
                                            class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                            name="date_debut" <?php if ((isset($_smarty_tpl->tpl_vars['prescription']->value))) {?>value="<?php echo $_smarty_tpl->tpl_vars['prescription']->value->date_debut->format('Y-m-d');?>
"<?php }?>>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="poids"
                                            class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Date fin
                                        </label>
                                        <input type="date"
                                            class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                            name="date_fin" <?php if ((isset($_smarty_tpl->tpl_vars['prescription']->value))) {?>value="<?php echo $_smarty_tpl->tpl_vars['prescription']->value->date_fin->format('Y-m-d');?>
"<?php }?>>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="numero_de_telephone"
                                            class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Prise par jour
                                        </label>
                                        <input type="number"
                                            class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                            name="prise_jour"<?php if ((isset($_smarty_tpl->tpl_vars['prescription']->value))) {?>value="<?php echo $_smarty_tpl->tpl_vars['prescription']->value->prise_jour;?>
"<?php }?>>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="note"
                                            class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">quand
                                        </label>
                                        <select class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" style="height: fit-content;"
                                            name="quand" >
                                            <option></option>
                                            <option value="avant_repas"<?php if ((isset($_smarty_tpl->tpl_vars['prescription']->value)) && $_smarty_tpl->tpl_vars['prescription']->value->avant_apres == "avant_repas") {?> selected<?php }?>>Avant</option>
                                            <option value="pendant_repas" <?php if ((isset($_smarty_tpl->tpl_vars['prescription']->value)) && $_smarty_tpl->tpl_vars['prescription']->value->avant_apres == "pendant_repas") {?> selected<?php }?>>Pendant</option>
                                            <option value="apres_repas" <?php if ((isset($_smarty_tpl->tpl_vars['prescription']->value)) && $_smarty_tpl->tpl_vars['prescription']->value->avant_apres == "apres_repas") {?> selected<?php }?>>Apres</option>
                                        </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                            <button type="submit" class="btn btn-primary" name="add">
                                                <?php if ((isset($_smarty_tpl->tpl_vars['prescription']->value))) {?>Enregistrer<?php } else { ?>Créer<?php }?>
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
