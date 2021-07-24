<?php
/* Smarty version 3.1.39, created on 2021-07-24 17:12:27
  from 'C:\Users\Nazim\Desktop\Cabinet-maroua\Views\creermedicament.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60fc49fb0edfc3_99365449',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef4d57f8ee87a8c18808da113243bfa0956ce30a' => 
    array (
      0 => 'C:\\Users\\Nazim\\Desktop\\Cabinet-maroua\\Views\\creermedicament.tpl',
      1 => 1627146745,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./components/navbar.tpl' => 1,
  ),
),false)) {
function content_60fc49fb0edfc3_99365449 (Smarty_Internal_Template $_smarty_tpl) {
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
                            <h2 class="tm-block-title d-inline-block">Ajouter un medicament</h2>
                        </div>
                    </div>
                    <form method="POST" action="\medicament<?php if ((isset($_smarty_tpl->tpl_vars['medicament']->value))) {?>/<?php echo $_smarty_tpl->tpl_vars['medicament']->value->id;
}?>">
                        <div class="row mt-4 tm-edit-product-row">
                            <div class="col-xl-7 col-lg-7 col-md-12">
                                <form action="" class="tm-edit-product-form">
                                    <div class="input-group mb-3">
                                        <label class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Nom</label>
                                        <input type="texte"
                                            class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                            name="nom" value="<?php if ((isset($_smarty_tpl->tpl_vars['medicament']->value))) {
echo $_smarty_tpl->tpl_vars['medicament']->value->nom;
}?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                            <button type="submit" class="btn btn-primary" name="add">
                                                <?php if ((isset($_smarty_tpl->tpl_vars['medicament']->value))) {?>Enregistrer<?php } else { ?>Ajouter<?php }?>
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
