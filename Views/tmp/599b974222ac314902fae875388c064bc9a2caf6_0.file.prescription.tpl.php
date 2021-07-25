<?php
/* Smarty version 3.1.39, created on 2021-07-24 23:07:22
  from 'C:\Users\Nazim\Desktop\Cabinet-maroua\Views\prescription.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60fc9d2a6185f2_40934258',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '599b974222ac314902fae875388c064bc9a2caf6' => 
    array (
      0 => 'C:\\Users\\Nazim\\Desktop\\Cabinet-maroua\\Views\\prescription.tpl',
      1 => 1627162443,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./components/navbar.tpl' => 1,
  ),
),false)) {
function content_60fc9d2a6185f2_40934258 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\Nazim\\Desktop\\Cabinet-maroua\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
?>
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
                                <h2 class="tm-block-title d-inline-block">Liste des prescriptions</h2>

                            </div>
                            <div class="col-md-4 col-sm-12 text-right">
                                <a href="prescription/creer" class="btn btn-small btn-primary">Prescrire un medicament</a>
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
                        <?php if ($_smarty_tpl->tpl_vars['_SESSION']->value['currentUser']->role == 'medecin') {?>
                        <div>
                            <form>
                                <select onchange="$(event.target.parentNode).submit()" name="patient">
                                    <option></option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['patients']->value, 'patient');
$_smarty_tpl->tpl_vars['patient']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['patient']->value) {
$_smarty_tpl->tpl_vars['patient']->do_else = false;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['patient']->value->ID_patient;?>
" <?php if ((isset($_smarty_tpl->tpl_vars['selectval']->value)) && $_smarty_tpl->tpl_vars['selectval']->value == $_smarty_tpl->tpl_vars['patient']->value->ID_patient) {?>selected<?php }?>><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['patient']->value->nom, 'UTF-8');?>
 <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['patient']->value->prenom);?>
</option>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    
                                </select>
                            </form>
                        </div>
                        <?php }?>
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
                                    <?php if ((isset($_smarty_tpl->tpl_vars['prescriptions']->value)) && $_smarty_tpl->tpl_vars['prescriptions']->value) {?>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['prescriptions']->value, 'prescription');
$_smarty_tpl->tpl_vars['prescription']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['prescription']->value) {
$_smarty_tpl->tpl_vars['prescription']->do_else = false;
?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo $_smarty_tpl->tpl_vars['prescription']->value->medicament->nom;?>

                                                </td>
                                                <td class="text-center">
                                                    <?php echo $_smarty_tpl->tpl_vars['prescription']->value->dose;?>

                                                </td>
                                                <td class="text-center">
                                                    <?php echo $_smarty_tpl->tpl_vars['prescription']->value->date_debut->format('d/m/Y');?>

                                                </td>
                                                <td class="text-center">
                                                    <?php echo $_smarty_tpl->tpl_vars['prescription']->value->date_fin->format('d/m/Y');?>

                                                </td>
                                                <td class="text-center">
                                                    <?php echo $_smarty_tpl->tpl_vars['prescription']->value->prise_jour;?>

                                                </td>
                                                <td class="text-center">
                                                    <?php echo $_smarty_tpl->tpl_vars['prescription']->value->avant_apres;?>

                                                </td>
                                                <?php if ($_smarty_tpl->tpl_vars['_SESSION']->value['currentUser']->role == "medecin") {?>
                                                <td>

                                                    <a data-targget="<?php echo $_smarty_tpl->tpl_vars['prescription']->value->ID_medicament;?>
_<?php echo $_smarty_tpl->tpl_vars['prescription']->value->ID_patient;?>
" class="delete fas fa-trash-alt tm-trash-icon"></a>
                                                </td>
                                                <td>
                                                    <a class="fas fa-pencil-alt tm-trash-icon"
                                                        href='\prescription/modifier/<?php echo $_smarty_tpl->tpl_vars['prescription']->value->ID_medicament;?>
_<?php echo $_smarty_tpl->tpl_vars['prescription']->value->ID_patient;?>
'></a>
                                                </td>
                                                <?php }?>
                                            </tr>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    <?php } else { ?>
                                        <div>Aucune prescription dans la BDD</div>
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
            <?php echo '</script'; ?>
>
</body>

</html><?php }
}
