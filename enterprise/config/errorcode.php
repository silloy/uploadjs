<?php

return [
    0    => "操作成功",
    1    => "操作失败",
    11   => "输入有误",

    /**
     * 1100 ~ 1300  注册
     */
    1101 => "账号只能是6-18位字母、数字和下划线",
    1102 => "非法请求",
    1103 => "用户名丢失",
    1104 => "密码丢失",
    1105 => "用户名必须是6-18位之间",
    1106 => "密码和确认密码不一致",
    1107 => "用户名已被注册",
    1108 => "密码或确认密码长度非法",
    1109 => "新增t_uid失败",
    1110 => "用户名或密码丢失",
    1111 => "此账户不存在",
    1112 => "用户名或密码不对",
    1113 => "新密码和确认新密码不相等",
    1114 => "注册失败",
    1115 => "请输入验证码",
    1116 => "账号不能是11位纯数字",
    1117 => "账号还没有注册为体验店账号",
    /**
     * 1300 ~ 1500  登录
     */
    1301 => "请先登录",
    1302 => "用户名不存在",
    1303 => "密码错误",
    1304 => "该用户已被锁定",
    1305 => "操作失败",
    1306 => "用户名不能为空",
    1307 => "请输入密码",
    1308 => "权限不足,请更换账号",

    /**
     * 2001 ~ 2100   其他
     */
    2001 => "参数错误",
    2002 => "校验错误", // 签名校验
    2003 => "手机号码格式不正确",
    2004 => "邮箱格式不正确",
    2005 => "短信验证码不正确",
    2006 => "验证码不正确", // 类似图片验证码
    2007 => "短信验证码发送太频繁", // 发送短信验证码太频繁
    2008 => "短信验证码发送次数超过5次", // 发送短信验证码次数超过5次
    2009 => "图片上传失败",
    2010 => "短信发送超时",
    2011 => "参数缺失或为空",
    2012 => "新密码输入错误",
    2013 => "原密码输入错误",
    2014 => "建立子账号关系必须为VRonline普通账号",
    2015 => "不能设置主账号为子账号",
    2016 => "子账号不能超过3个",
    2017 => "记录不存在",
    2019 => "openid错误",
    2024 => "操作太频繁",
    /**
     *2101~ 2200 绑定相关
     */

    2101 => "该手机号码已经绑定过",
    2102 => "该账已经绑定过手机号",
    2103 => "找回密码,重置密码失败",
    2104 => "该账已经绑定过邮箱",
    2105 => "该账未绑定手机号",
    2109 => "找回密码验证手机号与绑定手机号不一致",
    2110 => "验证码已过期，请重新发送",
    2111 => "验证码已达到最大错误次数，请重新获取",

    /**
     *2201~ 2300 绑定相关
     */

    2201 => "无此用户",

    /*
     * 2301~2400 页游相关
     */
    2301 => "您已经领取过该礼包了！",
    2302 => "该礼包已经被领完了！",
    2303 => "插入领取记录失败！",
    2304 => "该游戏不存在",
    2305 => "该游戏没有正在使用的服务器",
    2306 => "该礼包还没开始领取或领取已结束",
    2307 => "该服务器不存在",
    2308 => "该服务器中不存在角色，请重新选择服务器",

    /*
     * 2401~2500 open后台
     */
    2401 => "没有该操作权限",
    2402 => "用户状态错误",
    2403 => "审核失败",
    2404 => "用户不存在",
    2405 => "游戏不存在",
    2406 => "游戏状态错误",
    2407 => "图片同步失败",
    2409 => "数据同步失败",
    2410 => "open账号未登录",
    /*
     * 2501~2600 open后台 product
     */
    2501 => "未通过审核",
    2502 => "已经发布",
    2503 => "服务器名称不能重复",
    2504 => "服务器ID不能重复",
    2505 => "审核中 不能修改",
    2506 => "游戏名称已经存在",
    /*
     *    2601~2700
     */
    2601 => "请登录后，评论！",
    2602 => "您还没有体验此游戏，请进行游戏体验后再发表评论！",
    2603 => "你已经评论过该游戏了！",
    2604 => "已经点过了",
    2605 => "该游戏还没有评论！",
    2606 => "评论评分有误！",
    2607 => "评论删除失败！",
    2608 => "评论的类别参数不正确！",

    /*
     *    2701~2800 VR视频点赞
     */
    2701 => "你已经评过该视频了！",

    /*
     *    2801~2900 更新
     */
    2801 => "已经是最新版本",

    /*
     *    2901~3000 新闻资讯相关
     */
    2901 => "文章不存在",
    2902 => "已经点过赞了",

    /*
     *    3001~3100 线下体验店相关
     */
    3001 => "审核中 不能修改",
    3002 => "邮箱已经认证过",
    3003 => "未找到体验店信息",
    3004 => "缺少邮箱认证的必要信息",
    3005 => "邮箱还未验证，不能提交审核",
    3006 => "已经提交审核，请等待审核结果",
    3007 => '主机在线,请退出后再登录',
    3008 => '您的体验店账号还未通过审核，请耐心等待',

    /*
     *    3101~3200 购买游戏相关
     */
    3101 => "未购买该游戏",

    /*
     *    3201~3300 活动相关
     */
    3201 => "已经报名,上传您的作品吧",
    3202 => "报名失败,请重新报名",
    3203 => "还没有报名,请报名",
    3204 => "上传视频失败",

    /*
     *    3301~3400 vrgame版本相关
     *
     */
    3301 => "版本名称已经存在,请更换版本名称",
    3302 => "还有未发布的版本,请发布或删除后创建版本",
    3303 => "版本还未测试,请测试后发布",
    3304 => "版本文件错误",
];