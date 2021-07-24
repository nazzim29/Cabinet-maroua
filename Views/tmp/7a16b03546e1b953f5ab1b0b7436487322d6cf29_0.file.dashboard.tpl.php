<?php
/* Smarty version 3.1.39, created on 2021-07-21 17:44:42
  from 'C:\Users\Nazim\Desktop\Cabinet-maroua\Views\dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60f85d0a706037_38442557',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a16b03546e1b953f5ab1b0b7436487322d6cf29' => 
    array (
      0 => 'C:\\Users\\Nazim\\Desktop\\Cabinet-maroua\\Views\\dashboard.tpl',
      1 => 1626889480,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60f85d0a706037_38442557 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    Bienvenue <?php ob_start();
echo $_smarty_tpl->tpl_vars['_SESSION']->value['currentUser']->adresse_mail;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
 <?php ob_start();
echo $_smarty_tpl->tpl_vars['_SESSION']->value['currentUser']->role;
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>

    <a href="/logout">logout</a>
</body>
</html><?php }
}
