<?php
/* Smarty version 3.1.39, created on 2021-07-24 17:26:29
  from 'C:\Users\Nazim\Desktop\Cabinet-maroua\Views\components\navbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60fc4d452a5b18_69488552',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fed1f224979ef0e9ceb1abe2c1db1fbed32b2974' => 
    array (
      0 => 'C:\\Users\\Nazim\\Desktop\\Cabinet-maroua\\Views\\components\\navbar.tpl',
      1 => 1627147585,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60fc4d452a5b18_69488552 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="navbar navbar-expand-xl navbar-light bg-light">
                        <a class="navbar-brand">
                            <i class="fas fa-3x  ">
                                <img src="\public/img/logo02.png" alt="" style="height: 100px;" /></i>
                            <h1 class="tm-site-title mb-0">Docteur Houaoui</h1>
                        </a>
                        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="/rendez-vous">Rendez-vous
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/prescription">Prescription
                                    </a>
                                </li>
                                <?php if ($_smarty_tpl->tpl_vars['_SESSION']->value['currentUser']->role == 'medecin') {?>
                                <li class="nav-item active ">
                                    <a class="nav-link" href="/patient">Patient</a>
                                </li>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['_SESSION']->value['currentUser']->role == 'medecin') {?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/medicament">medicament</a>
                                </li>
                                <?php }?>
                            </ul>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link d-flex" href="/logout">
                                        <i class="far fa-user mr-2 tm-logout-icon"></i>
                                        <span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav><?php }
}
