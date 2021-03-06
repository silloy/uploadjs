@inject('blade', 'App\Helper\BladeHelper')
@extends('admincp.nav')
@section('head')
<script type="text/javascript" src="{{ static_res('/assets/loi/loiform.js') }}"></script>
@endsection
@section('content')
<div class="ui small button right floated blue" onclick="topEdit(0)"><i class="plus icon"></i>添加推荐位</div>

 <table class="ui sortable  celled table" style="margin-top:50px">
  <thead>
    <tr>
      <th width="10%">ID</th>
      <th width="20%">推荐位名称</th>
      <th width="20%">推荐位代码</th>
      <th width="10%">推荐位内容</th>
      <th width="20%">推荐位描述</th>
      <th width="10%" class="right aligned">操作</th>
    </tr>
  </thead>
  <tbody>
          @if($data->count()<1)
                <tr><td colspan="6" class="center aligned">暂无数据</td></tr>
          @else
              @foreach ($data as $val)
              <tr>
              <td data-val="{{ $val["posid"] }}">{{ $val["posid"] }}</td>
              <td class="action-edit"   data-id="{{ $val["posid"] }}">{{ $val["name"] }}</td>
              <td>{{ $val["code"] }}</td>
              <td>{{ $val["content_tp"] }}</td>
              <td>{{ $val["desc"] }}</td>
              <td class="right aligned"><i class="large minus circle icon red action-del"></i></td>
              </tr>
              @endforeach
          @endif
  </tbody>
</table>

<div class="ui modal modal-del">
  <i class="close icon"></i>
  <div class="header">删除推荐位</div>
  <div class="content">
  <input id="del_id" type="hidden"  >
  你确定要删除该推荐位吗？
  </div>
  <div class="actions">
  <div class="ui negative button" onclick="deleteData(0)">取消 </div>
  <div class="ui positive button" onclick="deleteData(1)">确定 </div>
  </div>
</div>

<div class="ui modal modal-add">
  <i class="close icon"></i>
  <div class="header">添加推荐位</div>
  <div class="content">
    <form class="ui form ">
      <input id="top_id" type="hidden"  >
       <div class="inline fields">
          <label>推荐位内容</label>
          <div class="field">
          <div class="ui radio checkbox">
          <input type="radio" name="top_content_tp" value="article">
          <label>文章</label>
          </div>
          </div>
          <div class="field">
          <div class="ui radio checkbox">
          <input type="radio" name="top_content_tp" value="banner">
          <label>广告</label>
          </div>
          </div>
     </div>
      <div class="field">
       <label>推荐位名称</label>
      <input id="top_name" type="text" >
      </div>
      <div class="field">
       <label>推荐位代码</label>
      <input id="top_code" type="text" >
      </div>
      <div class="field">
      <label>推荐位描述</label>
      <input id="top_desc" type="text"  >
      </div>
    </form>
     <div class="ui bottom attached warning message"></div>
  </div>
  <div class="actions">
    <div class="ui button action-save">保存</div>
  </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
var del_modal;
var edit_modal;
var warning_msg = $(".warning.message");
var del_id;


var loi = new loiForm();
$(".action-edit").click(function() {
   var id =  $(this).attr("data-id");
   topEdit(id)
});

function topEdit(id) {
  loi.edit("news_position",id,function(data){
    edit_modal = $('.ui.modal.modal-add').modal('show');
    warning_msg.hide();
  })
}

$(".action-save").click(function(){
  var editData = loi.save();
  if(typeof(editData.err) != "undefined") {
      warning_msg.html("还有未填写项目");
      warning_msg.show();
    } else {
      formData = loi.submit();
      permPost("/json/save/news_position",formData,function(data){
        location.reload();
      });
      edit_modal.modal('hide');
    }
});


$(".action-del").click(function() {
  var that = $(this);
  var obj = that.parent().parent().find("td:first");
  del_id = obj.attr('data-val');
  del_modal = $('.ui.modal.modal-del').modal('show');
})


function deleteData(tp) {
  del_modal.modal('hide');
  if(tp==1) {
    if(del_id>0) {
      permPost("/json/del/news_position",{del_id:del_id},function(data){
        location.reload();
      })
    }
  }
}
</script>
@endsection