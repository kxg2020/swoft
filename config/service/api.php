<?php
return [
    #非报表类服务接口(方案)
    "100" => [
        # 方案列表
        "1001" => ["api" => "/getLedPlanLists@POST","auth" => 'api-1001'],            #方案列表-方案列表查询
        "1002" => ["api" => "/send-to-dingding-master@POST","auth" => 'api-1002'],    #方案列表-发送审核通知
        "1003" => ["api" => "/plan/checkRenamed@POST","auth" => 'api-1003'],          #方案列表-方案重名判断
        "1004" => ["api" => "/create-plan@POST","auth" => 'api-1004'],                #方案列表-保存新增加方案
        "1005" => ["api" => "/getLedPlanDetail@GET","auth" => 'api-1005'],            #方案列表-方案详情
        "1006" => ["api" => "/plan@POST","auth" => 'api-1006'],                       #方案列表-修改方案
        "1007" => ["api" => "/plan/btPoint/list@GET","auth" => 'api-1007'],           #方案列表-被踢点位列表
        "1008" => ["api" => "/plan/btPoint/export@GET","auth" => 'api-1008'],         #方案列表-被踢点位导出
        # 方案列表(已删除)
        "1009" => ["api" => "/deleted/ledPlanLists@GET","auth" => 'api-1009'],        #方案列表(已删除)-查询列表
        "1010" => ["api" => "/deleted/ledPlan@POST","auth" => 'api-1010'],            #方案列表(已删除)-编辑
        "1011" => ["api" => "/deleted/ledPlan/recover@POST","auth" => 'api-1011'],    #方案列表(已删除)-恢复
        "1012" => ["api" => "/plan/btPoint/list@GET","auth" => 'api-1012'],           #方案列表(已删除)-被踢点位列表
        "1083" => ["api" => "/deleted/ledPlan@GET","auth" => 'api-1083'],             #方案列表(已删除)-方案详情
        # 点位调度(预定)
        "1013" => ["api" => "/getLedPlanSimpleDetail@GET","auth" => 'api-1013'],      #点位调度(预定)-方案信息(界面最上方)
        "1014" => ["api" => "/getPremises@POST","auth" => 'api-1014'],                #点位调度(预定)-项目选点-查询项目列表
        "1015" => ["api" => "/plan/premises@GET","auth" => 'api-1015'],               #点位调度(预定)-项目选点-查询已选项目
        "1016" => ["api" => "/addPremises@POST","auth" => 'api-1016'],                #点位调度(预定)-项目选点-添加已选项目
        "1017" => ["api" => "/delPremises@POST","auth" => 'api-1017'],                #点位调度(预定)-项目选点-移除已选项目
        "1018" => ["api" => "@GET","auth" => 'api-1018'],                             #点位调度(预定)-地图选点-项目列表-已选楼盘
        "1019" => ["api" => "@GET","auth" => 'api-1019'],                             #点位调度(预定)-地图选点-项目列表-未选楼盘
        "1020" => ["api" => "@GET","auth" => 'api-1020'],                             #点位调度(预定)-地图选点-项目列表-加入项目
        "1021" => ["api" => "@GET","auth" => 'api-1021'],                             #点位调度(预定)-点位调度-已选项目
        "1022" => ["api" => "/plan/machinesByPremisesId@GET","auth" => 'api-1022'],   #点位调度(预定)-点位调度-已选设备
        "1023" => ["api" => "/plan/machinesByPremisesId@GET","auth" => 'api-1023'],   #点位调度(预定)-点位调度-未选设备
        "1024" => ["api" => "/plan/pastePremisesNames@POST","auth" =>'api-1024'],     #点位调度(预定)-点位调度-项目名称粘贴
        "1025" => ["api" => "/plan/pasteMachine@POST","auth" => 'api-1025'],          #点位调度(预定)-点位调度-设备编号粘贴
        "1026" => ["api" => "@GET","auth" => 'api-1026'],                             #点位调度(预定)-点位调度-项目查询
        "1027" => ["api" => "/clearPremises@GET","auth" => 'api-1027'],               #点位调度(预定)-点位调度-整理方案
        "1077" => ["api" => "/getAllPremises@GET","auth" => 'api-1077'],              #点位调度(预定)-查询项目列表（全部）
        "1085" => ["api" => "/premises/option@GET","auth" => 'api-1085'],             #点位调度(预定)-获取项目搜索项
        # 方案排斥
        "1028" => ["api" => "/getExclude@GET","auth" => 'api-1028'],                  #方案排斥-查询
        "1029" => ["api" => "/delExclude@POST","auth" => 'api-1029'],                 #方案排斥-清除排斥
        "1030" => ["api" => "/addExclude@POST","auth" => 'api-1030'],                 #方案排斥-设备排斥
        "1031" => ["api" => "/addExclude@POST","auth" => 'api-1031'],                 #方案排斥-单元排斥
        "1032" => ["api" => "/addExclude@POST","auth" => 'api-1032'],                 #方案排斥-楼栋排斥
        "1033" => ["api" => "/addExclude@POST","auth" => 'api-1033'],                 #方案排斥-项目排斥
        "1078" => ["api" => "/getHasExclude@GET","auth" => 'api-1078'],               #方案排斥-已排斥方案列表
        # 方案拆解
        "1034" => ["api" => "/ledPlanSplit/splitPlan@GET","auth" => 'api-1034'],      #方案拆解-可选时间
        "1035" => ["api" => "/ledPlanSplit/splitPlanDate@POST","auth" => 'api-1035'], #方案拆解-拆解预览
        "1036" => ["api" => "/ledPlanSplit/submitSplit@POST","auth" => 'api-1036'],   #方案拆解-提交拆解
        "1037" => ["api" => "/order/list@GET","auth" => 'api-1037'],                  #方案拆解-方案自动拆解(定时任务)
        #
        "1038" => ["api" => "/delete-plan@POST","auth" => 'api-1038'],                #删除方案
        "1041" => ["api" => "/retain-sell@POST","auth" => 'api-1041'],                #保留转销售
        "1080" => ["api" => "/sell-retain@POST","auth" => 'api-1080'],                #销售转保留
        "1042" => ["api" => "/examine@POST","auth" => 'api-1042'],                    #数据审核
        "1043" => ["api" => "/change-date@POST","auth" => 'api-1043'],                #调整结束日
        # 余量订单
        "1044" => ["api" => "/marginOrder/list@GET","auth" => 'api-1044'],            #余量订单-查询订单列表
        "1045" => ["api" => "/marginOrder@POST","auth" => 'api-1045'],                #余量订单-新建订单
        "1046" => ["api" => "/marginOrder/update@POST","auth" => 'api-1046'],         #余量订单-编辑订单
        "1047" => ["api" => "/marginOrder@GET","auth" => 'api-1047'],                 #余量订单-订单详情
        "1082" => ["api" => "/getMarginOrder@GET","auth" => 'api-1082'],              #余量订单-根据业务人员获取余量订单
        # 余量方案
        "1048" => ["api" => "/getMarLists@GET","auth" => 'api-1048'],                 #余量方案-余量方案列表
        "1049" => ["api" => "/getMarDetail@GET","auth" => 'api-1049'],                #余量方案-余量方案详情
        "1050" => ["api" => "/addPlan@POST","auth" => 'api-1050'],                    #余量方案-新建余量方案
        "1051" => ["api" => "/updatePlan@POST","auth" => 'api-1051'],                 #余量方案-编辑余量方案
        "1052" => ["api" => "/delMarPlan@POST","auth" => 'api-1052'],                 #余量方案-删除余量方案
        "1053" => ["api" => "/marginPlan/btPoint/list@GET","auth" => 'api-1053'],     #余量方案-被踢点位列表
        "1084" => ["api" => "/marginPlan/changeDate@POST","auth" => 'api-1084'],      #余量方案-被踢点位列表
        # 公共模块
        "1054" => ["api" => "/saleUser@GET","auth" => 'api-1054'],                    #公共模块-业务人员
        "1055" => ["api" => "/create-man@GET","auth" => 'api-1055'],                  #公共模块-创建人
        "1056" => ["api" => "/getOrder@GET","auth" => 'api-1056'],                    #公共模块-根据业务人员获取所属订单
        "1057" => ["api" => "/supplier@GET","auth" => 'api-1057'],                    #公共模块-投放城市(公司)
        "1058" => ["api" => "/getAreas@GET","auth" => 'api-1058'],                    #公共模块-根据城市查询行政区域
        "1059" => ["api" => "/trade@GET","auth" => 'api-1059'],                       #公共模块-行业
        "1060" => ["api" => "/dictionary@GET","auth" => 'api-1060'],                  #公共模块-批量查询字典
        "1079" => ["api" => "/send-to-dingding-master@POST","auth" => 'api-1079'],    #公共模块-发送钉钉消息
        "1081" => ["api" => "/margin/level@GET","auth" => 'api-1081'],                #公共模块-获取余量等级
        # 日志管理
        "1061" => ["api" => "@GET","auth" => 'api-1061'],                             #日志管理-日志查询
        # 字典管理
        "1062" => ["api" => "@GET","auth" => 'api-1062'],                             #字典管理-查询一级字典
        "1063" => ["api" => "@GET","auth" => 'api-1063'],                             #字典管理-查询二级字典
        "1064" => ["api" => "@GET","auth" => 'api-1064'],                             #字典管理-新增一级字典
        "1065" => ["api" => "@GET","auth" => 'api-1065'],                             #字典管理-新增二级字典
        "1066" => ["api" => "@GET","auth" => 'api-1066'],                             #字典管理-编辑二级字典
        "1067" => ["api" => "@GET","auth" => 'api-1067'],                             #字典管理-二级字典详情
        # 行业管理
        "1068" => ["api" => "@GET","auth" => 'api-1068'],                             #行业管理-查询一级行业
        "1069" => ["api" => "@GET","auth" => 'api-1069'],                             #行业管理-查询二级行业
        "1070" => ["api" => "@GET","auth" => 'api-1070'],                             #行业管理-新增一级行业
        "1071" => ["api" => "@GET","auth" => 'api-1071'],                             #行业管理-新增二级行业
        "1072" => ["api" => "@GET","auth" => 'api-1072'],                             #行业管理-编辑二级行业
        "1073" => ["api" => "@GET","auth" => 'api-1073'],                             #行业管理-二级行业详情
        # MSP
        "1074" => ["api" => "/msp/planHasPointList@POST","auth" => ''],               #MSP-方案是否售卖了指定设备
        "1075" => ["api" => "/msp/getPlanPoint@GET","auth" => ''],                    #MSP-获取方案的点位详情
        "1076" => ["api" => "/msp/getScheduleProfile@GET","auth" => ''],              #MSP-方案点位调度概况
    ],
    #报表类服务地址
    "200" => [
        #方案列表
        "2001" => ["api" => "/exportPlanLists@GET","auth" => 'api-2001'],             #方案列表-按列表导出方案
        #方案列表(已删除)
        "2002" => ["api" => "/plan/point/export@GET","auth" => 'api-2002'],           #方案列表(已删除)-点位导出
        #匹配点位
        "2003" => ["api" => "/matchPoint/excelExport@POST","auth" => 'api-2003'],     #匹配点位-点位导出(EXCEL)
        "2004" => ["api" => "/matchPoint/excelExport@POST","auth" => 'api-2004'],     #匹配点位-点位导出(EXCEL,多坐标选点)
        "2005" => ["api" => "/matchPoint/htmlExport@GET","auth" => 'api-2005'],      #匹配点位-地图导出(多坐标选点)
        "2006" => ["api" => "/oss/getSignature@GET","auth" => 'api-2006'],            #匹配点位-上传签名获取
        #点位调度
        "2007" => ["api" => "/sell/preorder/specify@POST","auth" => 'api-2007'],      #点位调度-点位调度-设备编号粘贴
        #
        "2008" => ["api" => "/plan/point/export@GET","auth" => 'api-2008'],           #点位导出
        "2009" => ["api" => "/plan/point/mapExport@GET","auth" => 'api-2009'],        #地图导出
        #余量方案
        "2010" => ["api" => "/marginPlan/export@GET","auth" => 'api-2010'],           #余量方案-方案导出
        "2011" => ["api" => "/marginPlan/point/mapExport@GET","auth" => 'api-2011'],  #余量方案-地图导出
        "2034" => ["api" => "/marginPlan/point/export@GET","auth" => 'api-2034'],     #余量方案-点位导出
        "2035" => ["api" => "/marginPlan/btPoint/export@GET","auth" => 'api-2035'],   #余量方案-被踢点位导出
        #MSP
        "2012" => ["api" => "/msp/publishJson@POST","auth" => ''],                    #MSP-上刊表JSON
        "2013" => ["api" => "/msp/publishExcel@POST","auth" => ''],                   #MSP-上刊表Excel
        "2014" => ["api" => "/msp/publishCompressJson@POST","auth" => ''],            #MSP-压缩上刊表JSON
        "2015" => ["api" => "/msp/publishCompressExcel@POST","auth" => ''],           #MSP-压缩上刊表Excel
        "2016" => ["api" => "/waybill/waybillJson@POST","auth" => ''],                #MSP-路单表JSON
        "2017" => ["api" => "/waybill/waybillExcel@POST","auth" => ''],               #MSP-路单表Excel
        "2018" => ["api" => "/msp/exportV1Excel@POST","auth" => ''],                  #MSP-1.0表
        "2019" => ["api" => "/msp/crossScreenPlan@POST","auth" => ''],                #MSP-横屏上屏表
        "2020" => ["api" => "/msp/marginPlan/btPoint/list@GET","auth" => ''],         #MSP-导出余量被踢点位
        "2021" => ["api" => "/sell/selected@POST","auth" => ''],                      #MSP-导出已选点位Excel
        "2022" => ["api" => "/codeUpRateApi/codeRate@GET","auth" => ''],              #MSP-查询点位上刊率
        "2023" => ["api" => "/msp/getPlanList@POST","auth" => ''],                    #MSP-获取方案列表接口(余量)
        "2024" => ["api" => "/msp/getPlanById@POST","auth" => ''],                    #MSP-获取方案详情(余量)
        "2025" => ["api" => "/msp/revisePhoto@POST","auth" => ''],                    #MSP-修改拍照要求(余量)
        "2026" => ["api" => "/msp/getPhoto@POST","auth" => ''],                       #MSP-获取拍照要求(余量)
        "2027" => ["api" => "@GET","auth" => ''],                                     #MSP-余量方案列表
        "2028" => ["api" => "msp/searchPlanId@POST","auth" => ''],                    #MSP-获取方案ID
        "2029" => ["api" => "msp/searchPlanIdByCon@POST","auth" => ''],               #MSP-批量获取方案信息(余量)
        "2030" => ["api" => "@GET","auth" => ''],                                     #MSP-验证方案重名
        #素材系统
        "2031" => ["api" => "/msp/getDeviceResolution@POST","auth" => 'api-2031'],    #素材系统-上刊方案的点位分辨率
        "2032" => ["api" => "@GET","auth" => 'api-2032'],                             #素材系统-素材系统方案(点位接口)
        "2033" => ["api" => "@GET","auth" => 'api-2033'],                             #素材系统-素材系统方案点位数量接口

    ],
    #setpoint_service
    "300" => [
        #方案列表
        "3001" => ["api" => "/sell/clearKickedPoint@POST","auth" => 'api-3001'],      #方案列表-被踢点位清除
        "3002" => ["api" => "/sell/scheduleKickedDetail@POST","auth" => 'api-3002'],  #方案列表-被踢点位补回
        #点位调度
        "3003" => ["api" => "/sell/preorder@POST","auth" => 'api-3003'],              #点位调度-自动调度
        "3004" => ["api" => "/sell/removePoint@POST","auth" => 'api-3004'],           #点位调度-调度清零
        "3005" => ["api" => "/sell/preorder/specify@POST","auth" => 'api-3005'],      #点位调度-调度设备
        "3006" => ["api" => "/sell/removePremises@POST","auth" => 'api-3006'],        #点位调度-删除设备
        "3007" => ["api" => "/sell/schedule@POST","auth" => 'api-3007'],              #点位调度-设备分析
        #MSP
        "3008" => ["api" => "@GET","auth" => ''],                                     #MSP-上刊检查
        #
        "3009" => ["api" => "/sell/order@POST","auth" => 'api-3009'],                 #预定转保留
        "3010" => ["api" => "/sell/repreorder@POST","auth" => 'api-3010'],            #保留转预定
    ],

    #setpoint_excel
    "400" => [
        "2012" => ["api" => "/msp/publishJson@POST","auth" => ''],                    #MSP-上刊表JSON
        "2013" => ["api" => "/msp/publishExcel@POST","auth" => ''],                   #MSP-上刊表Excel
        "2014" => ["api" => "/msp/publishCompressJson@POST","auth" => ''],            #MSP-压缩上刊表JSON
        "2015" => ["api" => "/msp/publishCompressExcel@POST","auth" => ''],           #MSP-压缩上刊表Excel
        "2016" => ["api" => "/waybill/waybillJson@POST","auth" => ''],                #MSP-路单表JSON
        "2017" => ["api" => "/waybill/waybillExcel@POST","auth" => ''],               #MSP-路单表Excel
        "2018" => ["api" => "/msp/exportV1Excel@POST","auth" => ''],                  #MSP-1.0表
        "2019" => ["api" => "/msp/crossScreenPlan@POST","auth" => ''],                #MSP-横屏上屏表
        "2021" => ["api" => "/sell/selected@POST","auth" => ''],                      #MSP-导出已选点位Excel
        "2022" => ["api" => "/codeUpRateApi/codeRate@GET","auth" => ''],              #MSP-查询点位上刊率
        "4012" => ["api" => "/adxPublish/adxPublishJson@POST","auth" => ''],          #ADX-上刊表json
        "4013" => ["api" => "/sell/margin/selected@POST","auth" => ''],               #余量方案点位excel
    ],
    #setpoint_service
    "500" => [
        "1074" => ["api" => "/msp/planHasPointList@POST","auth" => ''],               #MSP-方案是否售卖了指定设备
        "1075" => ["api" => "/msp/getPlanPoint@POST","auth" => ''],                   #MSP-获取方案的点位详情
        "1076" => ["api" => "/msp/getScheduleProfile@POST","auth" => ''],             #MSP-方案点位调度概况
        "2031" => ["api" => "/msp/getDeviceResolution@POST","auth" => 'api-2031'],    #素材系统-上刊方案的点位分辨率
    ],
    #sale_service
    "600" => [
        "6000" => ["api" => "/msp/plan/btPoint/list@GET","auth" => ''],               #MSP-导出余量被踢点位商业方案
        "2020" => ["api" => "/msp/marginPlan/btPoint/list@GET","auth" => ''],         #MSP-导出余量被踢点位
        "2023" => ["api" => "/msp/getPlanList@POST","auth" => ''],                    #MSP-获取方案列表接口(余量)
        "2024" => ["api" => "/msp/getPlanById@POST","auth" => ''],                    #MSP-获取方案详情(余量)
        "2025" => ["api" => "/msp/revisePhoto@POST","auth" => ''],                    #MSP-修改拍照要求(余量)
        "2026" => ["api" => "/msp/getPhoto@POST"   ,"auth" => ''],                    #MSP-获取拍照要求(余量)
        "2028" => ["api" => "/msp/searchPlanId@POST","auth" => ''],                   #MSP-获取方案ID
        "2029" => ["api" => "/msp/searchPlanIdByCon@POST","auth" => ''],              #MSP-批量获取方案信息(余量)
        "2030" => ["api" => "/msp/verifyName@POST","auth" => ''],                     #MSP-验证方案重名
    ],
];
