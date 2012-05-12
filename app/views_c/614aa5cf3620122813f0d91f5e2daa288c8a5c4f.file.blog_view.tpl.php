<?php /* Smarty version Smarty-3.1.8, created on 2012-05-12 13:02:06
         compiled from "../app/views\blog_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:304774fae5f4e5d7d09-05320639%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '614aa5cf3620122813f0d91f5e2daa288c8a5c4f' => 
    array (
      0 => '../app/views\\blog_view.tpl',
      1 => 1336825015,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '304774fae5f4e5d7d09-05320639',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'blog_heading' => 0,
    'blog_content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fae5f4e64a4f3_23046796',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fae5f4e64a4f3_23046796')) {function content_4fae5f4e64a4f3_23046796($_smarty_tpl) {?><h1><?php echo $_smarty_tpl->tpl_vars['blog_heading']->value;?>
</h1>

<p><?php echo $_smarty_tpl->tpl_vars['blog_content']->value;?>
</p>
<?php }} ?>