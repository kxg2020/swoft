<?php
return [
    #非报表类服务接口(方案)
    "100" => [
        # 方案列表
        "1001" => ["api" => "/getLedPlanLists@GET","auth" => ''], #方案列表-方案列表查询
        "1002" => ["api" => "/order/list@GET","auth" => 20], #方案列表-发送审核通知
        "1003" => ["api" => "/plan/checkRenamed@POST","auth" => ''], #方案列表-方案重名判断
        "1004" => ["api" => "/create-plan@POST","auth" => ''], #方案列表-保存新增加方案
        "1005" => ["api" => "/getLedPlanDetail@GET","auth" => ''], #方案列表-方案详情
        "1006" => ["api" => "/sell/adjustPlan@POST","auth" => ''], #方案列表-修改方案
        "1007" => ["api" => "/plan/btPoint/list@GET","auth" => ''], #方案列表-被踢点位列表
        "1008" => ["api" => "/plan/btPoint/export@GET","auth" => ''], #方案列表-被踢点位导出
        # 方案列表(已删除)
        "1009" => ["api" => "/order/list@GET","auth" => 20], #方案列表(已删除)-查询列表
        "1010" => ["api" => "/order/list@GET","auth" => 20], #方案列表(已删除)-编辑
        "1011" => ["api" => "/order/list@GET","auth" => 20], #方案列表(已删除)-恢复
        "1012" => ["api" => "/order/list@GET","auth" => 20], #方案列表(已删除)-被踢点位列表
        # 点位调度(预定)
        "1013" => ["api" => "/order/list@GET","auth" => 20], #点位调度(预定)-方案信息(界面最上方)
        "1014" => ["api" => "/order/list@GET","auth" => 20], #点位调度(预定)-项目选点-查询项目列表
        "1015" => ["api" => "/order/list@GET","auth" => 20], #点位调度(预定)-项目选点-查询已选项目
        "1016" => ["api" => "/order/list@GET","auth" => 20], #点位调度(预定)-项目选点-添加已选项目
        "1017" => ["api" => "/order/list@GET","auth" => 20], #点位调度(预定)-项目选点-移除已选项目
        "1018" => ["api" => "/order/list@GET","auth" => 20], #点位调度(预定)-地图选点-项目列表-已选楼盘
        "1019" => ["api" => "/order/list@GET","auth" => 20], #点位调度(预定)-地图选点-项目列表-未选楼盘
        "1020" => ["api" => "/order/list@GET","auth" => 20], #点位调度(预定)-地图选点-项目列表-加入项目
        "1021" => ["api" => "/order/list@GET","auth" => 20], #点位调度(预定)-点位调度-已选项目
        "1022" => ["api" => "/order/list@GET","auth" => 20], #点位调度(预定)-点位调度-已选设备
        "1023" => ["api" => "/order/list@GET","auth" => 20], #点位调度(预定)-点位调度-未选设备
        "1024" => ["api" => "/order/list@GET","auth" => 20], #点位调度(预定)-点位调度-项目名称粘贴
        "1025" => ["api" => "/order/list@GET","auth" => 20], #点位调度(预定)-点位调度-设备编号粘贴
        "1026" => ["api" => "/order/list@GET","auth" => 20], #点位调度(预定)-点位调度-项目查询
        "1027" => ["api" => "/order/list@GET","auth" => 20], #点位调度(预定)-点位调度-整理方案
        # 方案排斥
        "1028" => ["api" => "/order/list@GET","auth" => 20], #方案排斥-查询
        "1029" => ["api" => "/order/list@GET","auth" => 20], #方案排斥-清除排斥
        "1030" => ["api" => "/order/list@GET","auth" => 20], #方案排斥-设备排斥
        "1031" => ["api" => "/order/list@GET","auth" => 20], #方案排斥-单元排斥
        "1032" => ["api" => "/order/list@GET","auth" => 20], #方案排斥-楼栋排斥
        "1033" => ["api" => "/order/list@GET","auth" => 20], #方案排斥-项目排斥
        # 方案拆解
        "1034" => ["api" => "/order/list@GET","auth" => 20], #方案拆解-可选时间
        "1035" => ["api" => "/order/list@GET","auth" => 20], #方案拆解-拆解预览
        "1036" => ["api" => "/order/list@GET","auth" => 20], #方案拆解-提交拆解
        "1037" => ["api" => "/order/list@GET","auth" => 20], #方案拆解-方案自动拆解(定时任务)
        #
        "1038" => ["api" => "/order/list@GET","auth" => 20], #删除方案
        "1039" => ["api" => "/sell/order@POST","auth" => ''], #转保留
        "1040" => ["api" => "/sell/repreorder@POST","auth" => ''], #转预定
        "1041" => ["api" => "/order/list@GET","auth" => 20], #转销售
        "1042" => ["api" => "/order/list@GET","auth" => 20], #数据审核
        "1043" => ["api" => "/sell/endSell@GET","auth" => ''], #调整结束日
        # 余量订单
        "1044" => ["api" => "/order/list@GET","auth" => 20], #余量订单-查询订单列表
        "1045" => ["api" => "/order/list@GET","auth" => 20], #余量订单-新建订单
        "1046" => ["api" => "/order/list@GET","auth" => 20], #余量订单-编辑订单
        "1047" => ["api" => "/order/list@GET","auth" => 20], #余量订单-订单详情
        # 余量方案
        "1048" => ["api" => "/order/list@GET","auth" => 20], #余量方案-余量方案列表
        "1049" => ["api" => "/order/list@GET","auth" => 20], #余量方案-余量方案详情
        "1050" => ["api" => "/order/list@GET","auth" => 20], #余量方案-新建余量方案
        "1051" => ["api" => "/order/list@GET","auth" => 20], #余量方案-编辑余量方案
        "1052" => ["api" => "/order/list@GET","auth" => 20], #余量方案-删除余量方案
        "1053" => ["api" => "/order/list@GET","auth" => 20], #余量方案-被踢点位列表
        # 公共模块
        "1054" => ["api" => "/saleUser@GET","auth" => ''],   #公共模块-业务人员
        "1055" => ["api" => "/create-man@GET","auth" => ''], #公共模块-创建人
        "1056" => ["api" => "/getOrder@GET","auth" => ''],   #公共模块-根据业务人员获取
        #所属订单
        "1057" => ["api" => "/supplier@GET","auth" => ''],   #公共模块-投放城市(公司)
        "1058" => ["api" => "/getOrder@GET","auth" => ''], #公共模块-根据城市查询行政区域
        "1059" => ["api" => "/trade@GET","auth" => ''],      #公共模块-行业
        "1060" => ["api" => "/dictionary@GET","auth" => ''], #公共模块-批量查询字典
        # 日志管理
        "1061" => ["api" => "/order/list@GET","auth" => 20], #日志管理-日志查询
        # 字典管理
        "1062" => ["api" => "/order/list@GET","auth" => 20], #字典管理-查询一级字典
        "1063" => ["api" => "/order/list@GET","auth" => 20], #字典管理-查询二级字典
        "1064" => ["api" => "/order/list@GET","auth" => 20], #字典管理-新增一级字典
        "1065" => ["api" => "/order/list@GET","auth" => 20], #字典管理-新增二级字典
        "1066" => ["api" => "/order/list@GET","auth" => 20], #字典管理-编辑二级字典
        "1067" => ["api" => "/order/list@GET","auth" => 20], #字典管理-二级字典详情
        # 行业管理
        "1068" => ["api" => "/order/list@GET","auth" => 20], #行业管理-查询一级行业
        "1069" => ["api" => "/order/list@GET","auth" => 20], #行业管理-查询二级行业
        "1070" => ["api" => "/order/list@GET","auth" => 20], #行业管理-新增一级行业
        "1071" => ["api" => "/order/list@GET","auth" => 20], #行业管理-新增二级行业
        "1072" => ["api" => "/order/list@GET","auth" => 20], #行业管理-编辑二级行业
        "1073" => ["api" => "/order/list@GET","auth" => 20], #行业管理-二级行业详情
        # MSP
        "1074" => ["api" => "/order/list@GET","auth" => 20], #MSP-方案是否售卖了指定设备(多个)
        "1075" => ["api" => "/order/list@GET","auth" => 20], #MSP-获取方案的点位详情
        "1076" => ["api" => "/order/list@GET","auth" => 20], #MSP-方案点位调度概况
    ],
    #报表类服务地址
    "200" => [
        #方案列表
        "2001" => ["api" => "/exportPlanLists@GET","auth" => ''], #方案列表-按列表导出方案
        #方案列表(已删除)
        "2002" => ["api" => "/order/list@GET","auth" => 20], #方案列表(已删除)-点位导出
        #匹配点位
        "2003" => ["api" => "/order/list@GET","auth" => 20], #匹配点位-点位导出(EXCEL)
        "2004" => ["api" => "/order/list@GET","auth" => 20], #匹配点位-点位导出(EXCEL,多坐标选点)
        "2005" => ["api" => "/order/list@GET","auth" => 20], #匹配点位-地图导出(多坐标选点)
        "2006" => ["api" => "/order/list@GET","auth" => 20], #匹配点位-上传
        #点位调度
        "2007" => ["api" => "/sell/preorder/specify@POST","auth" => ''], #点位调度-点位调度-设备编号粘贴
        #
        "2008" => ["api" => "/order/list@GET","auth" => 20], #点位导出
        "2009" => ["api" => "/order/list@GET","auth" => 20], #地图导出
        #余量方案
        "2010" => ["api" => "/order/list@GET","auth" => 20], #余量方案-方案导出
        "2011" => ["api" => "/order/list@GET","auth" => 20], #余量方案-地图导出
        #MSP
        "2012" => ["api" => "/order/list@GET","auth" => 20], #MSP-上刊表JSON
        "2013" => ["api" => "/order/list@GET","auth" => 20], #MSP-上刊表Excel
        "2014" => ["api" => "/order/list@GET","auth" => 20], #MSP-压缩上刊表JSON
        "2015" => ["api" => "/order/list@GET","auth" => 20], #MSP-压缩上刊表Excel
        "2016" => ["api" => "/order/list@GET","auth" => 20], #MSP-路单表JSON
        "2017" => ["api" => "/order/list@GET","auth" => 20], #MSP-路单表Excel
        "2018" => ["api" => "/order/list@GET","auth" => 20], #MSP-1.0表
        "2019" => ["api" => "/order/list@GET","auth" => 20], #MSP-横屏上屏表
        "2020" => ["api" => "/order/list@GET","auth" => 20], #MSP-导出余量被踢点位
        "2021" => ["api" => "/order/list@GET","auth" => 20], #MSP-导出已选点位Excel
        "2022" => ["api" => "/order/list@GET","auth" => 20], #MSP-查询点位上刊率
        "2023" => ["api" => "/order/list@GET","auth" => 20], #MSP-获取方案列表接口(余量)
        "2024" => ["api" => "/order/list@GET","auth" => 20], #MSP-获取方案详情(余量)
        "2025" => ["api" => "/order/list@GET","auth" => 20], #MSP-修改拍照要求(余量)
        "2026" => ["api" => "/order/list@GET","auth" => 20], #MSP-获取拍照要求(余量)
        "2027" => ["api" => "/order/list@GET","auth" => 20], #MSP-余量方案列表
        "2028" => ["api" => "/order/list@GET","auth" => 20], #MSP-获取方案ID
        "2029" => ["api" => "/order/list@GET","auth" => 20], #MSP-批量获取方案信息(余量)
        "2030" => ["api" => "/order/list@GET","auth" => 20], #MSP-验证方案重名
        #素材系统
        "2031" => ["api" => "/order/list@GET","auth" => 20], #素材系统-上刊方案的点位分辨率
        "2032" => ["api" => "/order/list@GET","auth" => 20], #素材系统-素材系统方案(点位接口)
        "2033" => ["api" => "/order/list@GET","auth" => 20], #素材系统-素材系统方案点位数量接口

    ],
    #选点服务地址
    "300" => [
        #方案列表
        "3001" => ["api" => "/plan/btPoint/clear@GET","auth" => ''], #方案列表-被踢点位清除
        "3002" => ["api" => "/plan/btPoint/makeUp@GET","auth" => ''], #方案列表-被踢点位补回
        #点位调度
        "3003" => ["api" => "/sell/preorder@POST","auth" => ''], #点位调度-自动调度
        "3004" => ["api" => "/sell/removePoint@POST","auth" => ''], #点位调度-调度清零
        "3005" => ["api" => "/sell/preorder/specify@POST","auth" => ''], #点位调度-调度设备
        "3006" => ["api" => "/sell/removePremises@POST","auth" => ''], #点位调度-删除设备
        "3007" => ["api" => "/sell/schedule@POST","auth" => ''], #点位调度-设备分析
        #MSP
        "3008" => ["api" => "/order/list@GET","auth" => 20], #MSP-上刊检查
    ],
];
