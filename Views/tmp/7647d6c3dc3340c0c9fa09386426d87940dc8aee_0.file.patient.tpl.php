<?php
/* Smarty version 3.1.39, created on 2021-07-24 20:46:07
  from 'C:\Users\Nazim\Desktop\Cabinet-maroua\Views\patient.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60fc7c0f3dc7d6_42041056',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7647d6c3dc3340c0c9fa09386426d87940dc8aee' => 
    array (
      0 => 'C:\\Users\\Nazim\\Desktop\\Cabinet-maroua\\Views\\patient.tpl',
      1 => 1627143275,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./components/navbar.tpl' => 1,
  ),
),false)) {
function content_60fc7c0f3dc7d6_42041056 (Smarty_Internal_Template $_smarty_tpl) {
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
                                <h2 class="tm-block-title d-inline-block">Liste des patients</h2>

                            </div>
                            <div class="col-md-4 col-sm-12 text-right">
                                <a href="patient/creer" class="btn btn-small btn-primary">Créer un patient</a>
                            </div>
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
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col" class="text-center">nom</th>
                                        <th scope="col" class="text-center">prenom</th>
                                        <th scope="col" class="text-center">age</th>
                                        <th scope="col" class="text-center"></th>

                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ((isset($_smarty_tpl->tpl_vars['patients']->value))) {?>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['patients']->value, 'patient');
$_smarty_tpl->tpl_vars['patient']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['patient']->value) {
$_smarty_tpl->tpl_vars['patient']->do_else = false;
?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo $_smarty_tpl->tpl_vars['patient']->value->nom;?>

                                                </td>
                                                <td class="text-center">
                                                    <?php echo $_smarty_tpl->tpl_vars['patient']->value->prenom;?>

                                                </td>
                                                <td class="text-center">
                                                    <?php echo $_smarty_tpl->tpl_vars['patient']->value->age;?>

                                                </td>
                                                <td>

                                                    <a data-targget="<?php echo $_smarty_tpl->tpl_vars['patient']->value->ID_patient;?>
" class="delete fas fa-trash-alt tm-trash-icon"></a>
                                                </td>
                                                <td>
                                                    <a class="fas fa-pencil-alt tm-trash-icon"
                                                        href='\patient/modifier/<?php echo $_smarty_tpl->tpl_vars['patient']->value->ID_patient;?>
'></a>
                                                </td>
                                            </tr>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    <?php } else { ?>
                                        <div>Aucun patient dans la BDD</div>
                                    <?php }?>
                                </tbody>
                            </table>
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
                    $('.delete').on('click', function(e) {
                        let id = $(e.target).data().targget

                        let xhr = new XMLHttpRequest()
                        xhr.open('delete','\\patient/'+id)
                        xhr.onload=()=>{
                            window.location.reload()
                        }
                        xhr.send()
                    })
                    $('.tm-product-name').on('click', function() {
                        window.location.href = "edit-product";
                    });
                })
            <?php echo '</script'; ?>
>
</body>

</html><?php }
}
