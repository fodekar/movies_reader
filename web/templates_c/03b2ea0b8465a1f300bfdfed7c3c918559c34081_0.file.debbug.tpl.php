<?php
/* Smarty version 3.1.34-dev-7, created on 2019-09-13 14:06:04
  from 'C:\Users\Fodekar\Documents\workspace\movies_reader\templates\Movies\debbug.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d7ba24c424989_93503037',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03b2ea0b8465a1f300bfdfed7c3c918559c34081' => 
    array (
      0 => 'C:\\Users\\Fodekar\\Documents\\workspace\\movies_reader\\templates\\Movies\\debbug.tpl',
      1 => 1568383556,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d7ba24c424989_93503037 (Smarty_Internal_Template $_smarty_tpl) {
?><ul>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['movies']->value, 'movie', false, 'index');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['movie']->value) {
?>
        <li><?php echo $_smarty_tpl->tpl_vars['index']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['movie']->value;?>
</li>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>
<video width="320" height="240" controls>
  <source src="Faune.wmv" type="video/wmv">
Your browser does not support the video tag.
</video>
<!--
<ul>
<?php
$_smarty_tpl->tpl_vars['counter'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['counter']->step = 1;$_smarty_tpl->tpl_vars['counter']->total = (int) ceil(($_smarty_tpl->tpl_vars['counter']->step > 0 ? 3+1 - (0) : 0-(3)+1)/abs($_smarty_tpl->tpl_vars['counter']->step));
if ($_smarty_tpl->tpl_vars['counter']->total > 0) {
for ($_smarty_tpl->tpl_vars['counter']->value = 0, $_smarty_tpl->tpl_vars['counter']->iteration = 1;$_smarty_tpl->tpl_vars['counter']->iteration <= $_smarty_tpl->tpl_vars['counter']->total;$_smarty_tpl->tpl_vars['counter']->value += $_smarty_tpl->tpl_vars['counter']->step, $_smarty_tpl->tpl_vars['counter']->iteration++) {
$_smarty_tpl->tpl_vars['counter']->first = $_smarty_tpl->tpl_vars['counter']->iteration === 1;$_smarty_tpl->tpl_vars['counter']->last = $_smarty_tpl->tpl_vars['counter']->iteration === $_smarty_tpl->tpl_vars['counter']->total;?>
    <li><?php echo $_smarty_tpl->tpl_vars['movies']->value[$_smarty_tpl->tpl_vars['counter']->value];?>
</li>
<?php }
}
?>
</ul>
--><?php }
}
