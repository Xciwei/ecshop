<!-- $Id: shop_config.htm 16865 2009-12-10 06:05:32Z sxc_shop $ -->
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,../js/region.js')); ?>
<style>
    .td_b_r{
        border-bottom:1px solid #dddddd;
        border-right:1px solid #dddddd;
        height: 35px;
    }
    .td_b{
        border-bottom:1px solid #dddddd;
        height: 35px;
    }
    .td_add{
        background-color: #f3fff6;
        height: 35px;
    }
    /* css注释：只对table td标签设置红色边框样式 */
</style>
<div class="tab-div">
    <!-- tab bar -->
    <div id="tabbar-div">
        <p>
            <span class="tab-front" id="banner-tab">广告位配置</span>
        </p>
    </div>
    <!-- tab body -->
    <div id="tabbody-div">

        <table width="100%" id="banner-table" style="display: table;">
            <tr><td>
                <div style="width:100%;border:solid 1px #dddddd;">
                    <form action=<?php echo $this->_var['items']['submit']; ?> method="post" enctype="multipart/form-data">
                        <table cellspacing="0px" width="100%"  style ="border-collapse:collapse">
                            <tr style="background-color: #f4f4f4" height="35px">
                                <th align="center" class="td_b_r"><font size="2">轮播图片地址</font></th>
                                <th align="center" class="td_b_r"><font size="2">轮播图片链接</font></th>
                                <th align="center" class="td_b_r"><font size="2">图片说明</font></th>
                                <th align="center" class="td_b_r"><font size="2">排序</font></th>
                                <th align="center" class="td_b"><font size="2">操作</font></th>
                            <tr>
                                <!--<?php $_from = $this->_var['playerdb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'param');$this->_foreach['group_items'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['group_items']['total'] > 0):
    foreach ($_from AS $this->_var['param']):
        $this->_foreach['group_items']['iteration']++;
?>-->
                            <tr>
                                <td align="center"  class="td_b_r"><a href="<?php echo $this->_var['param']['src']; ?>" target="_blank"><?php echo $this->_var['param']['src']; ?></a></td>
                                <td align="center"  class="td_b_r"><a href="<?php echo $this->_var['param']['url']; ?>" target="_blank"><?php echo $this->_var['param']['url']; ?></a></td>
                                <td align="center"  class="td_b_r"><?php echo $this->_var['param']['text']; ?></td>
                                <td align="center"  class="td_b_r"><?php echo $this->_var['param']['sort']; ?></td>
                                <td align="center"  class="td_b_r"><a href="?act=edit&id=<?php echo $this->_var['param']['id']; ?>">编辑</a> <a href="?act=del&id=<?php echo $this->_var['param']['id']; ?>">删除</a></td>
                            </tr>
                            <!--<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>-->
                            <tr>
                                <td colspan="5" align="center" class="td_add"><a href="?act=add">添加</a></td>
                            </tr>
                            <!--<tr>-->
                            <!--<th height="15px"></th>-->
                            <!--<td><input type="text" name="code" value="<?php echo $this->_var['items']['code']; ?>" style="display:none"></td>-->
                            <!--</tr>-->
                            <!--<tr style="border-top:1px solid #f1f1f1">-->
                            <!--<th width="20%"></th>-->
                            <!--<td align="right" height="35px" style="padding-right: 1%"><input type="submit" name="submit" style="background-color: #dcdcdc;width: 80px;height: 28px;border-radius: 2px;border: 1px solid #bcb8c7"></td>-->
                            <!--<tr>-->
                        </table>
                    </form>
                </div>
                </br></br>
            </td></tr>
        </table>
    </div>
</div>
<?php echo $this->smarty_insert_scripts(array('files'=>'tab.js,validator.js')); ?>

<script language="JavaScript">
    region.isAdmin = true;
    onload = function()
    {
        // 开始检查订单
        startCheckOrder();
    }
    var ReWriteSelected = null;
    var ReWriteRadiobox = document.getElementsByName("value[209]");

    for (var i=0; i<ReWriteRadiobox.length; i++)
    {
        if (ReWriteRadiobox[i].checked)
        {
            ReWriteSelected = ReWriteRadiobox[i];
        }
    }

    function ReWriterConfirm(sender)
    {
        if (sender == ReWriteSelected) return true;
        var res = true;
        if (sender != ReWriteRadiobox[0]) {
            var res = confirm('<?php echo $this->_var['rewrite_confirm']; ?>');
        }

        if (res==false)
        {
            ReWriteSelected.checked = true;
        }
        else
        {
            ReWriteSelected = sender;
        }
        return res;
    }
</script>
<script language="JavaScript">
    <!--
    onload = function()
    {
        // 开始检查订单
        startCheckOrder();
    }
    function check_del()
    {
        if (confirm('<?php echo $this->_var['lang']['trash_img_confirm']; ?>'))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * 安装Flash样式模板
     */
    function setupFlashTpl(tpl, obj)
    {
        window.current_tpl_obj = obj;
        if (confirm(setupConfirm))
        {
            Ajax.call('flashplay.php?is_ajax=1&act=install', 'flashtpl=' + tpl, setupFlashTplResponse, 'GET', 'JSON');
        }
    }

    function setupFlashTplResponse(result)
    {
        if (result.message.length > 0)
        {
            alert(result.message);
        }

        if (result.error == 0)
        {
            var tmp_obj = window.current_tpl_obj.parentNode.parentNode.previousSibling;
            while (tmp_obj.nodeName.toLowerCase() != 'tr')
            {
                tmp_obj = tmp_obj.previousSibling;
            }
            tmp_obj = tmp_obj.getElementsByTagName('center');
            tmp_obj[0].appendChild(document.getElementById('current_theme'));
        }

    }
    //-->
</script>

<?php echo $this->fetch('pagefooter.htm'); ?>