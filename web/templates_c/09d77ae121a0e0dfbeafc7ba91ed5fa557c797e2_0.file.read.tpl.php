<?php
/* Smarty version 3.1.34-dev-7, created on 2019-09-12 19:23:10
  from 'C:\Users\Fodekar\Documents\workspace\movies_reader\templates\Movies\read.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d7a9b1eba53a7_85500769',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09d77ae121a0e0dfbeafc7ba91ed5fa557c797e2' => 
    array (
      0 => 'C:\\Users\\Fodekar\\Documents\\workspace\\movies_reader\\templates\\Movies\\read.tpl',
      1 => 1568316167,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d7a9b1eba53a7_85500769 (Smarty_Internal_Template $_smarty_tpl) {
?><ul>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['myArray']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
    <li><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</li>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul><?php }
}
