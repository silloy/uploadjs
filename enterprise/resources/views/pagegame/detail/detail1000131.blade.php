@extends('pagegame.detailTmp.detail')
@section('detail_top_logo')
                <a href="javascript:;">
                    <img src="{{$images['slogo']}}" />
                </a>
@endsection
@section('role_intro')
            <div class="nav clearfix">
                <div class="fl part clearfix cur">
                    <div class="fl cur pr f18">医师</div>
                    <div class="fl pr f18">刀客</div>
                    <div class="fl pr f18">剑客</div>
                    <div class="fl pr f18">枪客</div>
                </div>
                <!-- <a class="fr clearfix" href="javascript:;"><span class="fl f14">更多</span><span class="fr">+</span></a> -->
            </div>
            <div class="newsCon show">
                <img class="role_bg" src="//pic.vronline.com/webgames/images/1000131/yishi.png" />
            </div>
            <div class="newsCon">
                <img class="role_bg" src="//pic.vronline.com/webgames/images/1000131/daoke.png" />
            </div>
            <div class="newsCon">
                <img class="role_bg" src="//pic.vronline.com/webgames/images/1000131/jianke.png" />
            </div>
            <div class="newsCon">
                <img class="role_bg" src="//pic.vronline.com/webgames/images/1000131/qiangke.png" />
            </div>
@endsection
@section('custom_center')
            <div class="clearfix">
                <div class="fl">
                    <p><span>传真电话：</span><span>021-54310366</span></p>
                    <p><span>客服电话：</span><span>021-54310366</span></p>
                    <p class="clearfix"><span class="fl">游戏咨询：</span><i class="fl">在线客服</i></p>
                    <p class="clearfix"><span class="fl">充值咨询：</span><i class="fl">在线客服</i></p>
                </div>
                <div class="fr">
                    <span><img src="//pic.vronline.com/webgames/images/kefu.jpg" title="请扫描二维码" /></span>
                    <p>扫二维码</p>
                </div>
            </div>
@endsection
