<?php if (!defined('THINK_PATH')) exit();?><div class="am-g" id="couple">
            <div class="am-u-12">
                    <form class="am-form">
                      <fieldset>
                        <legend>问题反馈</legend>
                        <div class="am-form-group">
                          <label for="doc-ipt-pwd-1">信息标题</label>
                          <input type="text" name="title" class="" id="doc-ipt-pwd-1" placeholder="请输入您的反馈问题简介">
                        </div>
                        <div class="am-form-group">
                          <label for="doc-select-1">信息分类</label>
                          <select id="doc-select-1" name="mtype">
                            <option value="1">意见反馈</option>
                            <option value="2">奖金问题</option>
                            <option value="3">帐号问题</option>
                            <option value="4">其他问题</option>
                          </select>
                          <span class="am-form-caret"></span>
                        </div>
                        <div class="am-form-group">
                          <label for="doc-ta-1">反馈内容</label>
<div id="editor" style="width:538px;height:200px;"></div>
<textarea class=""  name="msg" rows="5" id="doc-ta-1"></textarea>
<textarea id="explain-editor" style="width: 430px;heigth:300px;" name="remark"></textarea>
            </div>
          </fieldset>
        </form>
    </div>
</div>