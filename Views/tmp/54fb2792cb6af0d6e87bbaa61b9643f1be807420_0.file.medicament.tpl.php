<?php
/* Smarty version 3.1.39, created on 2021-07-24 17:22:54
  from 'C:\Users\Nazim\Desktop\Cabinet-maroua\Views\medicament.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60fc4c6e90fd50_66549023',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '54fb2792cb6af0d6e87bbaa61b9643f1be807420' => 
    array (
      0 => 'C:\\Users\\Nazim\\Desktop\\Cabinet-maroua\\Views\\medicament.tpl',
      1 => 1627147372,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./components/navbar.tpl' => 1,
  ),
),false)) {
function content_60fc4c6e90fd50_66549023 (Smarty_Internal_Template $_smarty_tpl) {
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
                                <h2 class="tm-block-title d-inline-block">Liste des Medicament</h2>

                            </div>
                            <div class="col-md-4 col-sm-12 text-right">
                                <a href="medicament/creer" class="btn btn-small btn-primary">Ajouter un medicament</a>
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
                                        <th scope="col" class="text-center"></th>
                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ((isset($_smarty_tpl->tpl_vars['medicaments']->value)) && $_smarty_tpl->tpl_vars['medicaments']->value) {?>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['medicaments']->value, 'medicament');
$_smarty_tpl->tpl_vars['medicament']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['medicament']->value) {
$_smarty_tpl->tpl_vars['medicament']->do_else = false;
?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo $_smarty_tpl->tpl_vars['medicament']->value->nom;?>

                                                </td>
                                                <td>
                                                    <a data-targget="<?php echo $_smarty_tpl->tpl_vars['medicament']->value->ID_medicament;?>
" class="delete fas fa-trash-alt tm-trash-icon"></a>
                                                </td>
                                                <td>
                                                    <a class="fas fa-pencil-alt tm-trash-icon"
                                                        href='\medicament/modifier/<?php echo $_smarty_tpl->tpl_vars['medicament']->value->ID_medicament;?>
'></a>
                                                </td>
                                            </tr>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    <?php } else { ?>
                                        <div>Aucun medicament dans la BDD</div>
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
                        xhr.open('delete','\\medicament/'+id)
                        xhr.onload=()=>{
                            window.location.reload()
                        }
                        xhr.send()
                    })
                })
            <?php echo '</script'; ?>
>
</body>

</html><?php }
}
