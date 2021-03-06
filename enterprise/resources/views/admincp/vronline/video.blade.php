@inject('blade', 'App\Helper\BladeHelper')
@extends('admincp.nav')
@section('head')
<script language="JavaScript" src="{{ static_res('/assets/loi/cos.js') }}"></script>
<script language="JavaScript" src="{{ static_res('/assets/loi/loiupload.js') }}"></script>
<script type="text/javascript" src="{{ static_res('/assets/loi/md5.js') }}"></script>
<script type="text/javascript" src="{{ static_res('/assets/loi/loiform.js') }}"></script>
<script type="text/javascript" src="{{ static_res('/assets/loi/message.js') }}"></script>
@endsection
@section('content')

<div class="ui basic small buttons">
{!! $blade->showHtmlClass('vronline_video_all',$curClass,'menu') !!}
</div>
<div class="ui small button right floated blue" onclick="dataEdit(0)"><i class="plus icon"></i>添加视频</div>


<div class="ui icon input" style="width:400px">
  <input type="text" class="action-search" placeholder="搜索视频" value="{{ $searchText }}">
  @if($searchText)
  <i class="large remove link icon"></i>
  @else
  <i class="large search link icon"></i>
  @endif
</div>

<table class="ui sortable celled table fixed">
  <thead>
    <tr>
      <th width="5%">ID</th>
      <th width="10%">标题</th>
      <th width="10%">简介</th>
      <th width="15%">封面</th>
      <th width="5%">状态</th>
      <th width="15%">分类</th>
      <th width="15%">预览</th>
      <th width="10%">创建时间</th>
      <th width="15%" class="right aligned">操作</th>
    </tr>
  </thead>
  <tbody>
          @if($data->count()<1)
                <tr><td colspan="9" class="center aligned">暂无数据</td></tr>
          @else
              @foreach ($data as $val)
              <tr>
              <td data-val="{{ $val["article_id"] }}">{{ $val["article_id"] }}</td>
              <td>{{ $val["article_title"] }}</td>
              <td>{{ $val["article_content"] }}</td>
              <td><a href="{{ static_image($val["article_cover"]) }}" target="_blank"><img class="ui tiny image" src="{{ static_image($val["article_cover"]) }}"></a></td>
              <td id="stat-{{ $val["article_id"] }}" data-val="{{ $val["article_stat"] }}">{{  $blade->showHtmlStat('article',$val["article_stat"]) }}</td>
              <td>{{  $blade->showHtmlClass('vronline_video',$val["article_category"]) }}</td>
              <td class="action-preview" data-title="{{ $val["article_title"] }}" data-tp="{{ $val["article_video_source_tp"] }}" data-val="{{ $val["article_video_source_url"] }}" > 播放 </td>
              <td>{{ $val["ctime"] }}</td>
              <td class="right aligned"><i class="large check circle icon teal action-audit"></i><i class="large send icon blue action-sub" data-id="{{ $val["article_id"] }}"></i>  <i class="large edit icon @if($val['article_stat']==1) grey @else blue @endif  action-edit" data-id="{{ $val["article_id"] }}"></i><i class="large minus circle icon red action-del"></i></td>
              </tr>
              @endforeach
          @endif
  </tbody>
   <tfoot>
    <tr><th colspan="9">
         {!! $data->appends(['choose' => $curClass,'search'=>$searchText])->render() !!}
    </th>
  </tr></tfoot>
</table>


<div class="ui modal modal-add">
  <i class="close icon"></i>
  <div class="header">添加视频</div>
  <div class="content">
    <form class="ui form"  onsubmit="return false;">
     <input id="video_id" type="hidden"  >
      <div class="three fields">
      <div class="field">
       <label>视频名称</label>
      <input id="video_title" type="text" >
      </div>
      <div class="field">
       <label>视频标签</label>
      <input id="video_tag" type="text" >
      </div>
      <div class="field">
       <label>视频时间</label>
      <input id="video_time" type="text" >
      </div>
      </div>
      <div class="field">
      <label>视频分类</label>
      <select  name="video_category" class="ui selection dropdown" multiple="" id="video_category">
      <option value="">请选择</option>
      {!! $blade->showHtmlClass('vronline_video','','select') !!}
      </select>
      </div>
      <div class="field">
      <label>视频简介</label>
      <textarea id="video_content" rows="2"></textarea>
      </div>
      <div class="fields">
        <div class="eight wide field">
          <div class="inline fields">
            <label>内容</label>
            <div class="field">
            <div class="ui radio checkbox">
            <input type="radio" name="video_tp" value="1">
            <label>普通</label>
            </div>
            </div>
            <div class="field">
            <div class="ui radio checkbox">
            <input type="radio" name="video_tp" value="2">
            <label>3D</label>
            </div>
            </div>
            <div class="field">
            <div class="ui radio checkbox">
            <input type="radio" name="video_tp" value="3">
            <label>VR</label>
            </div>
            </div>
          </div>
        </div>
        <div class="eight wide field">
          <div class="inline fields">
            <label>来源</label>
            <div class="field">
            <div class="ui radio checkbox">
            <input type="radio" name="video_source_tp" value="1">
            <label>本站</label>
            </div>
            </div>
            <div class="field">
            <div class="ui radio checkbox">
            <input type="radio" name="video_source_tp" value="2">
            <label>其他</label>
            </div>
            </div>
          </div>
        </div>
      </div>
      <div class="inline fields">
        <div class="field">
        <label>封面图片</label>
        <div class="ui segment">
        <img id="video_cover" class="preview ui small image">
        </div>
        </div>
        <div class="field" id="video_cover_container">
        <button  class="ui teal  button" id="video_cover_browser">选择</button>
        </div>
      </div>
      <div class="field video-other">
      <label>播放器代码</label>
      <textarea id="video_source_code" rows="2" placeholder="请填写通用代码，没有则填写html代码"></textarea>
      </div>
      <div class="fields video-local">
        <div class="eight wide field">
        <div class="ui action input" id="video_source_url_container">
        <input id="video_source_url" type="text" placeholder="" >
        <button  class="ui teal button action-video" id="video_source_url_browser">选择</button>
        </div>
        </div>
      </div>
      <div class="field" style="display: none">
        <div class="ui blue progress" data-percent="0" id="progress" style="width:100%">
        <div class="bar"></div>
        <div class="label">0%</div>
        </div>
      </div>
    </form>
  </div>

  <div class="actions">
    <div class="ui blue button action-save">保存</div>
  </div>
</div>

<div class="ui modal modal-sub">
  <i class="close icon"></i>
  <div class="header">提交审核</div>
  <div class="content">
  <input id="del_id" type="hidden"  >
  你确定要将该视频提交审核吗？
  </div>
  <div class="actions">
  <div class="ui negative button" onclick="subData(0)">取消 </div>
  <div class="ui positive button" onclick="subData(1)">确定 </div>
  </div>
</div>


<div class="ui modal modal-audit">
  <i class="close icon"></i>
  <div class="header">审核视频</div>
  <div class="content">
  <form class="ui form"  onsubmit="return false;">
  <input id="del_id" type="hidden"  >
  <div class="field">
      <label>审核批注</label>
      <textarea id="passmsg" rows="2"></textarea>
  </div>
  </form>
  </div>
  <div class="actions">
  <div class="ui negative button" onclick="audit(0)">驳回 </div>
  <div class="ui positive button" onclick="audit(1)">通过 </div>
  </div>
</div>


<div class="ui modal modal-del">
  <i class="close icon"></i>
  <div class="header">移除视频</div>
  <div class="content">
  <input id="del_id" type="hidden"  >
  你确定要移除该视频吗？
  </div>
  <div class="actions">
  <div class="ui negative button" onclick="deleteData(0)">取消 </div>
  <div class="ui positive button" onclick="deleteData(1)">确定 </div>
  </div>
</div>


<div class="ui modal modal-preview">
  <i class="close icon"></i>
  <div class="header"></div>
  <div class="content">
  </div>
</div>

@endsection

@section('javascript')
<script type="text/javascript">
var defaultImg = "semantic/images/image.png";
var del_id,del_modal,sub_id,sub_modal,edit_modal,preview_modal;
//var video_category = $('#video_category').dropdown();
var loi = new loiForm();
var progress = $('#progress').progress();

$(function() {
  $(".action-edit").click(function() {
    var id = $(this).attr("data-id");
    var stat = $("#stat-"+id).attr('data-val');
    if(stat==1 ) {
      loiMsg("审核中无法修改");
    } else {
      dataEdit(id)
    }
  });

   $(".action-preview").click(function() {
    var tp = $(this).attr("data-tp");
    var url = $(this).attr('data-val');
    var title = $(this).attr('data-title');
    $('.ui.modal.modal-preview .header').text(title);
    if(tp==2) {
      $('.ui.modal.modal-preview .content').html(url);
      if(url.indexOf('embed')!=-1) {
           $('.ui.modal.modal-preview .content embed').css("width","99%");
      } else {
         $('.ui.modal.modal-preview .content iframe').css("width","99%");
      }
    } else {
      var playUrl = '<video width="100%" height="500px" controls><source src="'+url+'" type="video/mp4"></video>'
      $('.ui.modal.modal-preview .content').html(playUrl);
    }
    preview_modal = $('.ui.modal.modal-preview').modal('show');
  });
  $(".action-save").click(function(){
    var editData = loi.save();
    if(typeof(editData.err) != "undefined") {
       loiMsg(editData.err+"未填写");
    } else {
      formData = loi.submit();
      if(formData.video_source_tp==1 && formData.video_source_url.length<5) {
         loiMsg("请上传视频");
      } else if(formData.video_source_tp==2 && formData.video_source_code.length<5) {
         loiMsg("请粘贴播放器代码");
      } else {
         permPost("/json/save/vronline_video",formData,function(data){
           location.reload();
        });
        edit_modal.modal('hide');
      }
    }
  });
  $(".action-sub").click(function() {
    var that = $(this);
    var obj = that.parent().parent().find("td:first");
    sub_id = obj.attr('data-val');
    sub_modal = $('.ui.modal.modal-sub').modal('show');
  });

  $(".action-del").click(function() {
    var that = $(this);
    var obj = that.parent().parent().find("td:first");
    del_id = obj.attr('data-val');
    del_modal = $('.ui.modal.modal-del').modal('show');
  });

  $(".action-search").keypress(function() {
    if(event.keyCode==13) {
       var searchText = $(this).val();
       location.href = "/vronline/video?search="+searchText;
    }
  });

  $(".search.link").click(function() {
      var searchText = $(this).prev().val();
      location.href = "/vronline/video?search="+searchText;
  })

  $(".remove.link").click(function() {
      var searchText = $(this).prev().val();
      location.href = "/vronline/video";
  })
  $('input[name="video_source_tp"]').change(function(){
     var sel_val = $(this).val()
     if(sel_val==1) {
        $('.video-local').show()
        $('.video-other').hide()
      } else {
        $('.video-local').hide()
        $('.video-other').show()
      }
  })
})
function dataEdit(id) {
    loi.edit("vronline_video",id,function(data){
        if(data.video_source_tp.val==2) {
          $('.video-local').hide()
          $('.video-other').show()
        } else {
          $('.video-local').show()
          $('.video-other').hide()
        }
        if(typeof(video_cover_obj)=="undefined") {
          var video_cover_obj = new loiUploadContainer({
          container:"video_cover_container",
          choose:"video_cover_browser",
          ext:"jpg,png",
          upload:{tp:"bannerimg",success:function(json){
          var jsonResult = $.parseJSON(json);
          var path = jsonResult.data.fileid;
          $("#video_cover").attr('src',img_domain+path);
          $("#video_cover").attr('data-val',path);
          },error:function(){}},
          filesAdd:function(files){
          // console.log(files)
          }
          });
        }
        if(typeof(video_source_url_obj)=="undefined") {
          video_source_url_obj = new loiUploadContainer({
          container:"video_source_url_container",
          choose:"video_source_url_browser",
          ext:"mp4",
          upload:{tp:"netcvideo",success:function(json){
            var res = $.parseJSON(json)
            var percent = 100;
            progress.progress({percent: percent});
            progress.find(".label").text(percent+"%");
            $("#video_source_url").val(video_domain+"/"+res.key);
          },sliceback:function(per){
              var num = new Number(per);
              num = num*100;
              var percent = num.toFixed(2)+"%";
              progress.progress({percent: num.toFixed(2)});
              progress.find(".label").text(percent)
          },error:function(msg){
            if(typeof(msg)=="string") {
                  loiNotifly(msg)
              } else if(typeof(msg)=="object") {
                  if(typeof(msg.responseText)!="undefined") {
                      var errJson =  $.parseJSON(msg.responseText)
                      loiNotifly("文件已经上传,请更换名称后重新上传",3000)
                  }
              }
              progress.parent().hide();
          }},
          filesAdd:function(files){
            progress.progress({percent: 0});
            progress.find(".label").text("0%");
            progress.parent().show();
          }
          });
        }
        edit_modal = $('.ui.modal.modal-add').modal('show');
    })
}


function subData(tp) {
  if(tp==1) {
    if(sub_id>0) {
      permPost("/json/save/vronline_video_sub",{id:sub_id},function(res){
      location.reload();
    });
    }
  }
}

function deleteData(tp) {
  if(tp==1) {
    if(del_id>0) {
      permPost("/json/del/vronline_video",{del_id:del_id},function(data){
        location.reload();
      })
    }
  }
}


var audit_modal;
var audit_id;

function audit(tp) {
  audit_modal.modal('hide');
  var msg = '';
  if(tp==0) {
    msg = $("#passmsg").val();
  }
  if(audit_id>0) {
    permPost("/json/pass/vronline_video",{edit_id:audit_id,tp:tp,msg:msg}, function(data){
      if(tp==1) {
         loiMsg("审核成功",function(){location.reload();},"success");
       } else {
         loiMsg("驳回成功",function(){location.reload();},"success");
       }
    });
  }
}

$(".action-audit").click(function() {
  var that = $(this);
  var obj = that.parent().parent().find("td:first");
  audit_id = obj.attr('data-val');
  $("#passmsg").val('');
  audit_modal = $('.ui.modal.modal-audit').modal('show');
})

</script>
@endsection
